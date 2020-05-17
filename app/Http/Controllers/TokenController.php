<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function __invoke(){
        $guzzle = new \GuzzleHttp\Client;

        $response = $guzzle->post('172.23.0.3/oauth/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true)['access_token'];
    }
}
