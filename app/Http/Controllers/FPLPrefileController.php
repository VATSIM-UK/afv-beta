<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FPLPrefileController extends Controller
{
    private $fields = [
        'type' => 'AIRCRAFT TYPE',
        'callsign' => 'CALLSIGN',
        'actype' => 'AIRCRAFT TYPE',
        'tas' => 'TRUE AIRSPEED',
        'origin' => 'DEPARTURE FIELD',
        'etd' => 'ESTIMATED DEPARTURE TIME',
        'altitude' => 'ALTITUDE',
        'route' => 'ROUTE',
        'destination' => 'ARRIVAL FIELD',
        'etehrs' => 'ESTIMATED TIME ENROUTE (HOURS)',
        'etemin' => 'ESTIMATED TIME ENROUTE (MINUTES)',
        'voice' => 'VOICE CAPABILITIES',
        'remarks' => 'REMARKS',
        'fobhrs' => 'FUEL ON BOARD (HOURS)',
        'fobmin' => 'FUEL ON BOARD (MINUTES)',
        'alternate' => 'ALTERNATE ARRIVAL FIELD',
        'name' => 'FULL NAME',
        'cid' => 'CID',
        'pwd' => 'PASSWORD',
    ];

    private $optional_fields = [
        'alternate',
        'remarks',
    ];

    private $errors = []; // Unfilled required fields
    private $FP = [];

    /* is_valid_plan                                                                     */
    /*          Checks if it's ok or not for this plan to be submitted                   */
    private function is_valid_plan()
    {
        return empty($this->errors);
    }

    /* clean_blanks                                                                     */
    /*          Removes any blank characters (string terminator, tabs, etc...)          */
    private static function clean_blanks($var)
    {
        return str_replace(["\n", "\t", "\r"], '', $var);
    }

    /* prepare                                                                          */
    /*          Prepares each field so it can be directly submitted to FSD              */
    private function prepare($key, $value)
    {
        // Field is empty and required (not optional)
        if (empty($value) && ! in_array($key, $this->optional_fields)) {
            $this->errors[$key] = $this->fields[$key];
        }

        // Field contains 'unauthorized' characters
        elseif (strpos($value, ':') !== false) {
            $this->errors[$key] = $this->fields[$key];
        }

        // If remarks, remove special prefile indicators
        elseif ($key == 'remarks') {
            $value = preg_replace('|/[VRT]/|', '', $value); // Voice capabilities
            $value = preg_replace("/\+VFPS\+/", '', $value); // Prefile indicator
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
        $this->FP['type'] = $this->prepare('type', $request->input('1', 'I'));
        $this->FP['callsign'] = $this->prepare('callsign', $request->input('2', ''));
        $this->FP['actype'] = $this->prepare('actype', $request->input('3', ''));
        $this->FP['tas'] = $this->prepare('tas', $request->input('4', ''));
        $this->FP['origin'] = $this->prepare('origin', $request->input('5', ''));
        $this->FP['etd'] = $this->prepare('etd', $request->input('6', ''));
        $this->FP['altitude'] = $this->prepare('altitude', $request->input('7', ''));
        $this->FP['route'] = $this->prepare('route', $request->input('8', ''));
        $this->FP['destination'] = $this->prepare('destination', $request->input('9', ''));
        $this->FP['etehrs'] = $this->prepare('etehrs', $request->input('10a', ''));
        $this->FP['etemin'] = $this->prepare('etemin', $request->input('10b', ''));
        $this->FP['voice'] = $this->prepare('voice', $request->input('11a', ''));
        $this->FP['remarks'] = $this->prepare('remarks', $request->input('11', ''));
        $this->FP['fobhrs'] = $this->prepare('fobhrs', $request->input('12a', ''));
        $this->FP['fobmin'] = $this->prepare('fobmin', $request->input('12b', ''));
        $this->FP['alternate'] = $this->prepare('alternate', $request->input('13', ''));
        $this->FP['name'] = $this->prepare('name', Auth::User()->name_first.' '.Auth::User()->name_last);
        $this->FP['cid'] = $this->prepare('cid', Auth::User()->id);
        $this->FP['pwd'] = $this->prepare('pwd', $request->input('16', ''));
    }

    /* get_fsd_packet                                                   */
    /*          Get values from $FP in FSD packet format                */
    /*          is_valid_plan() must be true before calling this        */
    private function get_fsd_packet()
    {
        assert($this->is_valid_plan());

        $plan = [];
        $plan[] = 'FILE';

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
        $plan[] .= '+VFPS+'.$this->FP['voice'].$this->FP['remarks'];
        $plan[] .= $this->FP['route'];

        $plan = implode(':', $plan);

        return strtoupper($plan);
    }

    /* submit_to_fsd                                                                    */
    /*          This function handles any connection to FSD. It sends the flightplan    */
    /*          and returns the response fom the server.                                */
    private function submit_to_fsd()
    {
        $packet = $this->get_fsd_packet();

        $sock = fsockopen('127.0.0.1', 4194);
        if (! $sock) {
            return 'CONNERR';
        }

        fwrite($sock, $packet."\r\n");
        $result = fgets($sock, 4096);
        fclose($sock);
        $result = preg_replace("/[\r\n]/", '', $result);

        return $result;
    }

    /* submit                                                                        */
    /*          This function will be called when a POST request WITH CSRF Token     */
    /*          is submitted. It will validate (not verify!) all fields and if all   */
    /*          values is ok, it will submit it to FSD and handle the response.      */
    /*          If any field can't be validated, it will display the prefile page    */
    /*          with any errors being marked.                                        */
    public function submit(Request $request)
    {
        $this->set_fp_content($request);

        if (! $this->is_valid_plan()) {
            return $this->get($request, true);
        } // Invalid fields

        $response = $this->submit_to_fsd(); // Everything correct, so send to FSD
        $fields = explode(':', $response);

        switch ($fields[0]) {
            case 'OK':
                return $this->get($request)->withSuccess('Flightplan submitted');
            case 'CALLINUSE':
                return $this->get($request)->withError('Someone seems to be using that callsign already :(');
            case 'CID':
                return $this->get($request)->withError('Please check your CID/Password');
            default:
                Log::error(Auth::User()->id.' - PrefileError | FSDResponse - '.$response);

                return $this->get($request)->withError("We're having trouble submitting your flightplan :(");
        }
    }

    /* get                                                                       */
    /*          This function will be called when a GET request is submitted     */
    /*          It will prefill the flightplan with GET parameters or default    */
    /*          values if not set. If show_errors is true (a.k.a. function was   */
    /*          called after post request, it will display errors (if any) to    */
    /*          the user.                                                        */
    public function get(Request $request, $show_errors = false)
    {
        if ($this->FP === []) {
            $this->set_fp_content($request);
        } // Only fill if not done yet (A.K.A. only if this function called directly)

        $fp_data = $this->FP;

        if ($show_errors) {
            $errors = $this->errors;

            return view('prefile.form', compact('fp_data', 'errors'));
        } else {
            return view('prefile.form', compact('fp_data'));
        }
    }

    /* post                                                                     */
    /*          This function will be called when a POST request is submitted.  */
    /*          It will prefill the flightplan if CSRF token is not set with    */
    /*          POST parameters or default values if not. If CSRF token is set, */
    /*          it will submit the form.                                        */
    public function post(Request $request)
    {
        // Populate fields (To-Do)
        if ($request->input('submit') === null) {
            return $this->get($request);
        }

        // Submit flightplan
        else {
            return $this->submit($request);
        }
    }
}
