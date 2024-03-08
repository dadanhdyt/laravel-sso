<?php
namespace Argan\Oauthclient;
use Argan\Oauthclient\Config;
use GuzzleHttp\Client;

class GetUserInfo{
    public $url = "http:/localhost:8000/api/userinfo";
    public Config $config;
    public function __construct(Config $config){
        $this->config = $config;
    }
    public function getUserInfo($token){
        $client = new Client();
        try {
            $response = $client->get($this->url, [
                'headers' => [
                    'Authorization' => "Bearer ".$token['aksess_token'],
                ]
            ]);
            $response = $response->getBody();
            return json_decode($response,true)['userinfo'];
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}

?>
