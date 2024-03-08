<?php
use Argan\Oauthclient\Client;
use Argan\Oauthclient\GetUserInfo;

require 'ArganAuthConfig.php';

$client = new Client($config);

if(isset($_GET['code']) && $_GET['code']) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $user = new GetUserInfo($config);
    $user = $user->getUserInfo($token);
   var_dump($user);
}
