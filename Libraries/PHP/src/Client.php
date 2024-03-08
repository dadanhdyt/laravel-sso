<?php

namespace Argan\Oauthclient;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Client
{
    public ?Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    public function fetchAccessTokenWithAuthCode(string $authCode)
    {
        $httpClient = new GuzzleHttpClient();
        try {
            $response = $httpClient->request('POST', $this->config->getAksesTokenURL(), [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'secret_key' => $this->config->getSecretKey(),
                    'client_id' => $this->config->getClientId(),
                    'code' => $authCode,
                ]
            ]);
            if ($response->getStatusCode() >= 200) {
                $response = ($response->getBody());
                return json_decode($response, true);
            }
        } catch (ServerException $th) {
            dd($th->getMessage());
        } catch (ClientException $clientException) {
            dd($clientException->getMessage());
        }
    }
    public function fetchAccessTokenWithPassword()
    {
    }
}
