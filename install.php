<?php

$config = array(
    'ShopUrl' => 'firstone132.myshopify.com',
    'AccessToken' => '7ebf9c0f47534e46963ff61f89347a88',
);

PHPShopify\ShopifySDK::config($config);

//your_authorize_url.php
$scopes = 'read_products,write_products,read_script_tags,write_script_tags, read_orders, write_orders';
//This is also valid
//$scopes = array('read_products','write_products','read_script_tags', 'write_script_tags'); 
$redirectUrl = 'https://getorder.herokuapp.com/install.php';

\PHPShopify\AuthHelper::createAuthRequest($scopes, $redirectUrl);
PHPShopify\ShopifySDK::config($config);
$accessToken = \PHPShopify\AuthHelper::getAccessToken();

echo $accessToken;
?>