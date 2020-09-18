<?php
// require_once("inc/functions.php");

// $requests = $_GET;
// $hmac = $_GET['hmac'];
// $serializeArray = serialize($requests);
// $requests = array_diff_key($requests, array('hmac' => ''));
// ksort($requests);

// $token = "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";
// $shop = "firstone132";

// $collectionList = shopify_call($token, $shop, "/admin/api/2020-07/custom_collections.json", array(), 'GET');
// $collectionList = json_decode($collectionList['response'], JSON_PRETTY_PRINT);
// $collection_id = $collectionList['custom_collections'][0]['id'];

// $array = array("collection_id"=>$collection_id);
// $collects = shopify_call($token, $shop, "/admin/api/2020-07/collects.json", $array, 'GET');
// $collects = json_decode($collects['response'], JSON_PRETTY_PRINT);


// foreach($collects as $collect){ 
//     foreach($collect as $key => $value){ 
//     	$products = shopify_call($token, $shop, "/admin/api/2020-07/products/".$value['product_id'].".json", array(), 'GET');
// 		$products = json_decode($products['response'], JSON_PRETTY_PRINT);
// 		echo $products['product']['id'];
//     }
// }

require 'vendor/autoload.php'; 

use Shopify\ShopifyClient;

$access_token = "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";

$client = new ShopifyClient($access_token, "firstone132.myshopify.com");
$products = $client->products->readList();

$newOrder = ['line_items' => [['title' => 'just a test', 'price' => 4]]];
$response = $client->orders->create($newOrder);
?>




