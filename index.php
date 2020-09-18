<?php

require __DIR__ . '/vendor/autoload.php';

$config = array(
    'ShopUrl' => 'firstone132.myshopify.com',
    'AccessToken' => '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',
);


$shopify = new PHPShopify\ShopifySDK($config);


$products = $shopify->Product->get();


$order = array (
    "email" => "foo@example.com",
    "fulfillment_status" => "unfulfilled",
    "line_items" => [
      [
          "variant_id" => 34711827677342,
          "quantity" => 5
      ]
    ]
);

$shopify->Order->post($order);
?>
