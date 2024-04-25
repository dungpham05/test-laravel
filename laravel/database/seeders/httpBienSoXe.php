<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LicensePlate;
use Illuminate\Support\Facades\Log;

class httpBienSoXe extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configGuzzle = [
            'allow_redirects' => [
                'track_redirects' => true,
            ],
        ];
        $client = new \GuzzleHttp\Client();
        $insert = [];
        $error = [];
        $type = 4;
        $url = 'https://dichbiensoxe.com/dich-bien-so/dich-bien-so-xe-';
        $re = '/<article(.*?)<\/article>/s';

        for ($i = 1; $i <= 9999; $i++) {
            sleep(1);
            $iToStr = sprintf("%04d", $i);
            $response = $client->request('GET', $url . $i, $configGuzzle);

            if ($response->getStatusCode() == 200) {

                $numberFind = $iToStr;
                $finalURL = $response->getHeader('X-Guzzle-Redirect-History');
                if (!empty($finalURL)) {
                    $numberFind = str_replace($url, "", end($finalURL));
                }

                $response = $response->getBody()->getContents();
                preg_match($re, $response, $matches, PREG_OFFSET_CAPTURE, 0);

                $insert[] = [
                    'type' => $type,
                    'number_search' => $iToStr,
                    'number_find' => $numberFind,
                    'content' => $matches[0][0]
                ];

            } else {
                $error[] = [
                    'number_search' => $iToStr,
                    'status' => $response->getStatusCode()
                ];
            }
        }

        $type = 5;
        for ($i = 1; $i <= 99999; $i++) {
            sleep(1);
            $iToStr = sprintf("%04d", $i);
            $response = $client->request('GET', $url . $i, $configGuzzle);

            if ($response->getStatusCode() == 200) {

                $numberFind = $iToStr;
                $finalURL = $response->getHeader('X-Guzzle-Redirect-History');
                if (!empty($finalURL)) {
                    $numberFind = str_replace($url, "", end($finalURL));
                }

                $response = $response->getBody()->getContents();
                preg_match($re, $response, $matches, PREG_OFFSET_CAPTURE, 0);

                $insert[] = [
                    'type' => $type,
                    'number_search' => $iToStr,
                    'number_find' => $numberFind,
                    'content' => $matches[0][0]
                ];

            } else {
                $error[] = [
                    'number_search' => $iToStr,
                    'status' => $response->getStatusCode()
                ];
            }
        }

        Log::debug($error);

        LicensePlate::insert($insert);
    }
}
