<?php
namespace Argan\Oauthclient;

use Argan\Oauthclient\Config;

class GetLoginUrl{

    public Config $config;

    public function __construct(Config $config){
        $this->config =$config;
    }

    public function buildQueryParams(){
        $query = [
            'client_id' => $this->config->getClientId(),
            'redirect_uri' => urldecode($this->config->getRedirectUri()),
        ];
        if($this->config->getState()){
            $state  = md5(openssl_random_pseudo_bytes(236));
            $query['state'] = $state;
        }
        return '?'.http_build_query($query);
    }
    public function getUrl(){
        return $this->config->getAuthorizeURL().$this->buildQueryParams();
    }
}
