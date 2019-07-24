<?php

namespace App\Http\Controllers;

class MetarController extends Controller
{
    public function __invoke($icao)
    {
        echo '<html><body style="background-color: indigo;color: aqua;">';
        if ($icao == 'LIXX') {
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
                'LICJ',
            ];

            foreach ($icaos as $icao) {
                $metar = @file_get_contents("https://avwx.rest/api/metar/$icao?options=&format=json&onfail=cache");
                if (! $metar) {
                    continue;
                }
                $metar = json_decode($metar);
                try {
                    echo $metar->sanitized.'<br>';
                } catch (Exception $e) {
                    echo "Couldn't find $icao METAR";
                }
            }
        } elseif ($icao == 'ENXX') {
            $icaos = [
                'ENGM',
                'ENTO',
                'ENRY',
                'ENNO',
                'ENGK',
                'ENCN',
            ];

            foreach ($icaos as $icao) {
                $metar = @file_get_contents("https://avwx.rest/api/metar/$icao?options=&format=json&onfail=cache");
                if (! $metar) {
                    continue;
                }
                $metar = json_decode($metar);
                if (array_key_exists('error', $metar)) continue;
                try {
                    echo $metar->sanitized."\r\n";
                } catch (Exception $e) {
                    //
                }
            }
        } else {
            $metar = @file_get_contents("https://avwx.rest/api/metar/$icao?options=&format=json&onfail=cache");
            if (! $metar) {
                echo "Couldn't find METAR";
            }
            $metar = json_decode($metar);
            try {
                echo $metar->sanitized."\r\n";
            } catch (Exception $e) {
                echo "Couldn't find METAR";
            }
        }
        echo '</body></html>';
    }
}
