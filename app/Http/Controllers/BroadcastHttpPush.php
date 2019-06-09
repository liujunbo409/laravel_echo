<?php

namespace App\HelpTrait;

use GuzzleHttp\Client;

trait BroadcastHttpPush
{
    public function push($data)
    {
        $baseUrl = env('WEBSOCKET_BASEURL', 'http://localhost:6001/');
        $appId = env('WEBSOCKET_APPID', '938fa7b5f169c771');
        $key = env('WEBSOCKET_KEY', '922db1f6a0cb873bb6442e89a29f1dba');
        $httpUrl = $baseUrl . 'apps/' . $appId . '/events?auth_key=' . $key;

        $client = new Client([
            'base_uri' => $httpUrl,
            'timeout' => 2.0,
        ]);
        $response = $client->post($httpUrl, [
            'json' => $data
        ]);
        $code = $response->getStatusCode();
    }
}