<?php
// require_once("inc/functions.php");

// $requests = $_GET;
// $hmac = $_GET['hmac'];
// $serializeArray = serialize($requests);
// $requests = array_diff_key($requests, array('hmac' => ''));
// ksort($requests);

// $token = "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";
// $shop = "firstone132";

// $collectionList = shopify_call($token, $shop, "/admin/api/2020-07/orders.json?status=any", array(), 'GET');
// $collectionList = json_decode($collectionList['response'], JSON_PRETTY_PRINT);


// echo $collectionList['orders']['id'][0];
// exit();
// $collection_id = $collectionList['custom_collections'][0]['id'];

// $array = array("collection_id"=>$collection_id);
// $collects = shopify_call($token, $shop, "/admin/api/2020-07/collects.json", $array, 'GET');
// $collects = json_decode($collects['response'], JSON_PRETTY_PRINT);

// foreach($collects as $collect){ 
//     foreach($collect as $key => $value){ 
//     		$products = shopify_call($token, $shop, "/admin/api/2020-07/products/".$value['product_id'].".json", array(), 'GET');
// 		$products = json_decode($products['response'], JSON_PRETTY_PRINT);
// 		echo $hmac;
	    

//     		$images_count = shopify_call($token, $shop, "/admin/api/2020-07/products/".$products['product']['id']."/images.json", array(), 'GET');
//     		$images = shopify_call($token, $shop, "/admin/api/2020-07/products/".$products['product']['id']."/images.json", array(), 'GET');
// 	    	$image_count = json_decode($image['reponse'], JSON_PRETTY_PRINT);
// 		$images = json_decode($images['response'], JSON_PRETTY_PRINT);
	    	
	    	
	    
// 		$i = 0;
	    
// 	    while($images['images'][$i])
// 	    {
// 		    $item_default_image = $images['images'][$i]['src'];
// 		    $i++;
		    

// 		echo '<img src="'.$item_default_image.'" style="width: 200px; height: 230px;"/>';
// 	    }
//     } 
// }

require 'php-shopify-api/src/shopify.php'; 

// use src\ShopifyClient;

$api = new Shopify('firstone132.myshopify.com', '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');

// Get all products
// $result = $api->call('GET', 'admin/products.json');

// Get the products with ids of '632910392' and '921728736' with only the 'id', 'images', and 'title' fields

// Create a new "Burton Custom Freestyle 151" product
$result = $api->call('POST', 'admin/products.json', [
    'product' => [
        "title"        => "Burton Custom Freestyle 151",
        "body_html"    => "<strong>Good snowboard!</strong>",
        "vendor"       => "Burton",
        "product_type" => "Snowboard",
        "tags"         => 'Barnes & Noble, Johns Fav, "Big Air"',
    ],
]);
?>
