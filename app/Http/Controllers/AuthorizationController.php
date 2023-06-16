<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    private $apiUrl = 'https://api-v4.easyflor.eu/api/';

    public function cookieAuthorization(Request $request)
    {
        $client = new Client(['base_uri' => $this->apiUrl]);

        try {
            $response = $client->post('authorization', [
                'json' => [
                    'Username' => $request->input('Username'),
                    'Password' => $request->input('Password'),
                    'Database' => $request->input('Database'),
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                // Successful authorization, retrieve the cookie
                $cookie = $response->getHeaderLine('Set-Cookie');

                // Store the cookie in the user's session for subsequent requests
                session(['apiCookie' => $cookie]);

                return response()->json(['message' => 'Authorization successful']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Authorization failed'], 401);
        }
    }

    public function tokenAuthorization(Request $request)
    {
        $client = new Client(['base_uri' => $this->apiUrl]);

        try {
            $response = $client->post('authorizationtoken', [
                'json' => [
                    'Username' => $request->input('Username'),
                    'Password' => $request->input('Password'),
                    'Database' => $request->input('Database'),
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);
                $token = $responseData['Token'];

                // Store the token in the user's session or any secure storage
                session(['apiToken' => $token]);

                return response()->json(['message' => 'Authorization successful']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Authorization failed'], 401);
        }
    }

    public function logout()
    {
        // For cookie-based authorization, invalidate the session cookie
        session()->forget('apiCookie');

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function getDebtor()
    {
        $token = session('apiToken');
        $cookie = session('apiCookie');

        $client = new Client(['base_uri' => $this->apiUrl]);

        try {
            $response = $client->get('debtor', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => $token ? 'Bearer ' . $token : null,
                    'Cookie' => $cookie ?: null,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);
                // Process the response data
                return response()->json($responseData);
            }
        } catch (\Exception $e) {
            if ($e->getCode() === 401) {
                // Unauthorized
                return response()->json(['message' => 'Unauthorized'], 401);
            } else {
                // Other error occurred
                return response()->json(['message' => 'Error occurred'], 500);
            }
        }
    }
}
