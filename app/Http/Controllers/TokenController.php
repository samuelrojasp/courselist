<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function __invoke(Request $request){
        $guzzle = new \GuzzleHttp\Client;

        $response = $guzzle->post($request->getSchemeAndHttpHost().'/oauth/token', [
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
