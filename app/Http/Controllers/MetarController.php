<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetarController extends Controller
{
    public function __invoke($icao)
    {
        if ($icao == 'LIXX')
        {
            $icaos = [
                'LMML',
                'LIRQ',
                'LIRP',
                'LIRN',
                'LIRF',
                'LIRA',
                'LIEO',
                'LIEE',
                'LIEA',
                'LICR',
                'LICC',
                'LICA',
                'LICJ'
            ];

            foreach ($icaos as $icao)
            {
                $metar = @file_get_contents("https://avwx.rest/api/metar/$icao?options=&format=json&onfail=cache");
                if(! $metar) continue;
                $metar = json_decode($metar);
                try{
                    echo $metar->sanitized . '<br>';
                } catch (Exception $e) {
                    continue;
                }
            }
            return;
        }
        else{
            $metar = @file_get_contents("https://avwx.rest/api/metar/$icao?options=&format=json&onfail=cache");
            if(! $metar) return;
            $metar = json_decode($metar);
            try{
                return $metar->sanitized . '<br>';
            } catch (Exception $e) {
                return;
            }
        }
    }
}
