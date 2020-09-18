<?php

$config = array(
    'ShopUrl' => 'firstone132.myshopify.com',
    'AccessToken' => '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',
);


$shopify = new PHPShopify\ShopifySDK($config);

$order = array (
    "email" => "foo@example.com",
    "fulfillment_status" => "unfulfilled",
    "line_items" => [
      [
          "variant_id" => 5302158327966,
          "quantity" => 5
      ]
    ]
);

$shopify->Order->post($order);
?>
