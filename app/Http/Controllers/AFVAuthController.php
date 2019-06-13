<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Approval;
use App\Models\User;

class AFVAuthController extends Controller
{
    //////////////////////////////////////////////////////
    // This class/controller handles all approvals      //
    // in the AFV Auth server. It can do the following: //
    //      - Approve a CID                             //
    //      - Send all approved CIDs                    //
    //      - Revoke a CID                              //
    //////////////////////////////////////////////////////

    private static $base; // Base API URL
    private static $bearer; // Token to authenticate to API

    
    /**
     * Initializes Parameters and gets authenttication token.
     *
     * @return FALSE on error
     */
    public function __construct()
    {
        self::$base = config('afv.api'); // Sets base URL
        $url = self::$base . 'api/v1/auth'; // Endpoint to be accessed

        $data = json_encode([
            "Username" => config('afv.user'),
            "Password" => config('afv.pass'),
            "NetworkVersion" => config('afv.networkVersion')
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1); // POST Request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data),
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Send the request
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode != 200){
            return ["code" => $httpCode, "message" => $result];
        }

        self::$bearer = $result;
    }
    

    /**
     * Submits a PUT Request
     *
     * @param $data Content to be sent with the request
     * @return TRUE or array
     */
    private function doPUT($data = array())
    {
        $url = self::$base . 'api/v1/users/enabled';
        $content = json_encode($data);        

        $ch = curl_init(); // Start cURL

        curl_setopt($ch, CURLOPT_URL, $url); // DESTINATION
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // TYPE
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content); // CONTENT
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( // HEADERS
            'Content-Type: application/json',
            'Content-Length: ' . strlen($content),
            'Authorization: Bearer ' . self::$bearer
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch); // Send the request
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get response code

        curl_close($ch); // End cURL

        if ($httpCode == 200) return TRUE;
        elseif ($httpCode == 400) return ["code" => $httpCode, "message" => json_decode($result)->message]; // TRUE if 200 - OK, FALSE if not
        else return ["code" => $httpCode, "message" => $result];
    }


    /**
     * Approve a new user.
     *
     * @param $cid CID to approve
     * @return TRUE or array
     */
    public function approveCID($cid)
    {
        $data = [
            ["Username" => (string)$cid, "Enabled" => true]
        ];

        return self::doPUT($data);
    }


    /**
     * Sends all approved CIDs - SYNCs DBs.
     *
     * @return TRUE or array
     */
    public function syncApprovals()
    {
        $data = [];

        $approved = Approval::approved()->pluck('user_id');
        foreach($approved as $cid){
            $data[] = ["Username" => (string)$cid, "Enabled" => true];
        }

        /*$nApproved = User::pending()->pluck('id');
        foreach($nApproved as $cid){
            $data[] = ["Username" => (string)$cid, "Enabled" => false];
        }*/

        return self::doPUT($data);
    }


    /**
     * Revoke a user's beta access.
     *
     * @param $cid CID to revoke
     * @return TRUE or array
     */
    public function revokeCID($cid)
    {
        $data = [
            ["Username" => (string)$cid, "Enabled" => false]
        ];

        return self::doPUT($data);
    }
}
