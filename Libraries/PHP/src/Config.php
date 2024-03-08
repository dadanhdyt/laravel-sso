<?php

namespace Argan\Oauthclient;
class Config{
    public $authorizeURL = 'http://localhost:8000/sso/authorize';
    public $aksesTokenURL = 'http://localhost:8000/sso/oauth2/token';
    public ?string $secret_key;
    public ?string $client_id;
    public ?string $redirect_uri;
    public ?string $state;

    public function __construct(string $secret_key,$client_id,$redirect_uri, $state = null){
        $this->secret_key = $secret_key;
        $this->client_id = $client_id;
        $this->redirect_uri = $redirect_uri;
        $this->state = $state;
    }
    public function getConfig(){
        return [
            'secret_key' => $this->secret_key,
            'client_id' => $this->client_id,
            'redirect_uri' => $this->redirect_uri,
            'state' => $this->state,
            'authorizeURL' => $this->authorizeURL,
        ];
    }
    public function getAuthorizeURL(){
        return $this->authorizeURL;
    }
    public function getAksesTokenURL(){
        return $this->aksesTokenURL;
    }
    public function getSecretKey(){
        return $this->secret_key;
    }
    public function getClientId(){
        return $this->client_id;
    }
    public function getRedirectUri(){
        return $this->redirect_uri;
    }
    public function getState(){
        return $this->state;
    }

}
