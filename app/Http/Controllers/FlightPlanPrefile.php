<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightPlanPrefile extends Controller
{
    private $optional_fields = ["alternate", "remarks"];
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

    private $required = []; // Unfilled required fields
    private $colons = []; // Fields with one or more colons
    private $FP = [];



    /* is_valid_plan                                                                     */
    /*          Checks if it's ok for this plan to be submitted                          */
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

        return clean_blanks($value);
    }


    /* set_fp_content                                                                   */
    /*          Copy values from request variables to $FP so that they can be used      */
    /*          through the rest of the form.                                           */
    /*          This will allow access from external sites (like VAs, SimBrief, etc...) */
    /*          Fields have still not been 'cleaned' from anything other than blanks,   */
    /*          like ':', for example.                                                  */
    private function set_fp_content(Request $request)
    {    
        $FP['type']         = prepare("type", $request->input("1", "I"));
        $FP['callsign']     = prepare("callsign", $request->input("2", ""));
        $FP['actype']       = prepare("actype", $request->input("3", ""));
        $FP['tas']          = prepare("tas", $request->input("4", ""));
        $FP['origin']       = prepare("origin", $request->input("5", ""));
        $FP['etd']          = prepare("etd", $request->input("6", ""));
        $FP['altitude']     = prepare("altitude", $request->input("7", ""));
        $FP['route']        = prepare("route", $request->input("8", ""));
        $FP['destination']  = prepare("destination", $request->input("9", ""));
        $FP['etehrs']       = prepare("etehrs", $request->input("10a", ""));
        $FP['etemin']       = prepare("etemin", $request->input("10b", ""));
        $FP['voice']        = prepare("voice", $request->input("voice", ""));
        $FP['remarks']      = prepare("remarks", $request->input("11", ""));
        $FP['fobhrs']       = prepare("fobhrs", $request->input("12a", ""));
        $FP['fobmin']       = prepare("fobmin", $request->input("12b", ""));
        $FP['alternate']    = prepare("alternate", $request->input("13", ""));
        $FP['name']         = prepare("name", $request->input("14", ""));
        $FP['cid']          = prepare("cid", $request->input("15", ""));
        $FP['pwd']          = prepare("pwd", $request->input("16", ""));
    }


    public function submit_plan(Request $request)
    {
        set_fp_content($request);
        
        if (!is_valid_plan()) // One or more fields submitted contain errors
            return "NOCALL";
        else{
            // Convert $FP to FSD string and submit
        }
    }

}
