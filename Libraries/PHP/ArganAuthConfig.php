<?php
use Argan\Oauthclient\Config;
use Argan\Oauthclient\GetLoginUrl;

require './vendor/autoload.php';

$config = new Config(
    secret_key:'123',
    client_id:'1234',
    redirect_uri:'http://localhost:8001/callback.php',
    state:true,
);



$loginUrl = (new GetLoginUrl($config))->getUrl();
