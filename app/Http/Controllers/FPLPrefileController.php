<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FPLPrefileController extends Controller
{
    private $fields = array(
        "type" => "AIRCRAFT TYPE",
        "callsign" => "CALLSIGN",
        "actype" => "AIRCRAFT TYPE",
        "tas" => "TRUE AIRSPEED",
        "origin" => "DEPARTURE FIELD",
        "etd" => "ESTIMATED DEPARTURE TIME",
        "altitude" => "ALTITUDE",
        "route" => "ROUTE",
        "destination" => "ARRIVAL FIELD",
        "etehrs" => "ESTIMATED TIME ENROUTE (HOURS)",
        "etemin" => "ESTIMATED TIME ENROUTE (MINUTES)",
        "voice" => "VOICE CAPABILITIES",
        "remarks" => "REMARKS",
        "fobhrs" => "FUEL ON BOARD (HOURS)",
        "fobmin" => "FUEL ON BOARD (MINUTES)",
        "alternate" => "ALTERNATE ARRIVAL FIELD",
        "name" => "FULL NAME",
        "cid" => "CID",
        "pwd" => "PASSWORD",
    );

    private $optional_fields = array(
        "alternate",
        "remarks"
    );

    private $required = []; // Unfilled required fields
    private $colons = []; // Fields with one or more colons
    private $FP = [];

    /* is_valid_plan                                                                     */
    /*          Checks if it's ok or not for this plan to be submitted                   */
    private function is_valid_plan()
    {
        return (empty($this->required) && empty($this->colons));
    }


    /* clean_blanks                                                                     */
    /*          Removes any blank characters (string terminator, tabs, etc...)          */
    private static function clean_blanks($var)
    {
        return str_replace(array("\n", "\t", "\r"), '', $var);
    }


    /* prepare                                                                          */
    /*          Prepares each field so it can be directly submitted to FSD              */
    private function prepare($key, $value)
    {
        // Field is empty and required (not optional)
        if (empty($value) && !array_key_exists($key, $this->optional_fields))
            $this->required[] = $this->fields[$key];
            
        // Field contains 'unauthorized' characters
        else if (strstr($value, ":") !== false)
            $this->colons[] = $this->fields[$key];

        // If remarks, remove special prefile indicators
        else if ($key == "remarks"){
            $value = preg_replace("|/[VRT]/|", "", $value); // Voice capabilities
            $value = preg_replace("/\+VFPS\+/", "", $value); // Prefile indicator
        }

        return $this->clean_blanks($value);
    }


    /* set_fp_content                                                                   */
    /*          Copy values from request variables to $FP so that they can be used      */
    /*          through the rest of the form.                                           */
    /*          This will allow access from external sites (like VAs, SimBrief, etc...) */
    /*          Fields have still not been 'cleaned' from anything other than blanks,   */
    /*          like ':', for example.                                                  */
    private function set_fp_content(Request $request)
    {    
        $this->FP['type']         = $this->prepare("type", $request->input("1", "I"));
        $this->FP['callsign']     = $this->prepare("callsign", $request->input("2", ""));
        $this->FP['actype']       = $this->prepare("actype", $request->input("3", ""));
        $this->FP['tas']          = $this->prepare("tas", $request->input("4", ""));
        $this->FP['origin']       = $this->prepare("origin", $request->input("5", ""));
        $this->FP['etd']          = $this->prepare("etd", $request->input("6", ""));
        $this->FP['altitude']     = $this->prepare("altitude", $request->input("7", ""));
        $this->FP['route']        = $this->prepare("route", $request->input("8", ""));
        $this->FP['destination']  = $this->prepare("destination", $request->input("9", ""));
        $this->FP['etehrs']       = $this->prepare("etehrs", $request->input("10a", ""));
        $this->FP['etemin']       = $this->prepare("etemin", $request->input("10b", ""));
        $this->FP['voice']        = $this->prepare("voice", $request->input("voice", ""));
        $this->FP['remarks']      = $this->prepare("remarks", $request->input("11", ""));
        $this->FP['fobhrs']       = $this->prepare("fobhrs", $request->input("12a", ""));
        $this->FP['fobmin']       = $this->prepare("fobmin", $request->input("12b", ""));
        $this->FP['alternate']    = $this->prepare("alternate", $request->input("13", ""));
        $this->FP['name']         = $this->prepare("name", $request->input("14", ""));
        $this->FP['cid']          = $this->prepare("cid", $request->input("15", ""));
        $this->FP['pwd']          = $this->prepare("pwd", $request->input("16", ""));
    }


    /* get_fsd_packet                                                   */
    /*          Get values from $FP in FSD packet format                */
    /*          is_valid_plan() must be true before calling this        */
    private function get_fsd_packet()
    {
        assert($this->is_valid_plan());

        $plan = [];
        $plan[] = "FILE";

        $plan[] .= $this->FP['cid'];
        $plan[] .= $this->FP['pwd'];
        $plan[] .= $this->FP['callsign'];
        $plan[] .= $this->FP['type'];
        $plan[] .= $this->FP['actype'];
        $plan[] .= $this->FP['tas'];
        $plan[] .= $this->FP['origin'];
        $plan[] .= $this->FP['etd'];
        $plan[] .= $this->FP['altitude'];
        $plan[] .= $this->FP['destination'];
        $plan[] .= $this->FP['etehrs'];
        $plan[] .= $this->FP['etemin'];
        $plan[] .= $this->FP['fobhrs'];
        $plan[] .= $this->FP['fobmin'];
        $plan[] .= $this->FP['alternate'];
        $plan[] .= "+VFPS+" . $this->FP['voice'] . $this->FP['remarks'];
        $plan[] .= $this->FP['route'];

        $plan = implode(':', $plan);

        return strtoupper($plan);
    }


    private function submit_to_fsd()
    {
        $packet = $this->get_fsd_packet();

        $sock = @fsockopen("127.0.0.1", 4194);
        if (!$sock) {
            return "Couldn't connect to FSD port";
        }
        fputs($sock, $packet . "\r\n");
        $result = fgets($sock, 4096);
        fclose($sock);
        $result = preg_replace("/[\r\n]/", '', $result);
        return $result;
    }


    public function post(Request $request)
    {
        $this->set_fp_content($request);
        
        if (!$this->is_valid_plan()) // There's an error with some field
            return "NOCALL";
        
        return $this->submit_to_fsd();
    }


    public function show(Request $request)
    {
        return view('prefile.form');
    }

    
    public function test(Request $request)
    {
        echo $this->post($request);
        die();
    }
}
