<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function __invoke(){
        $guzzle = new \GuzzleHttp\Client;

        $response = $guzzle->post('http://23people.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => '3',
                'client_secret' => 'B9yO1gOhHXXgsJpgM92rJiCcyXUyvkHdj1WomXRf',
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true)['access_token'];
    }
}
