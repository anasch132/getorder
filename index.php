<?php
session_start();
header("Access-Control-Allow-Origin: *");

$variantId = "34753233387686";
if (!isset($variantId))
{
  echo "please put a regular product link";
  exit();
}

require __DIR__ . '/vendor/autoload.php';
$config = array(
  'ShopUrl' => 'zinniatic.myshopify.com/',
  'ApiKey' => 'e29918eda1e541b915c2b38eacef328e',
  'Password' => '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',
);



$shopify = new PHPShopify\ShopifySDK($config);

$products = $shopify->Product->get();

if (1)
{
  $phone = $_GET['phone'];
  $name = $_GET['name'];
  $address = $_GET['address'];

    $order = array (
      "phone"=> $phone,
      "fulfillment_status" => "unfulfilled",
        "send_receipt" => true,
        "send_fulfillment_receipt" => true,
        "line_items" => [
        [
          "variant_id" => $variantId,
          "quantity" => 1
        ]
      ],
      "customer" => [
        "first_name" => $name,
        "last_name" => "blank",
        "emal" => "blank"
      ],
      "billing_address" => [
        "first_name" => $name,
        "last_name" => "blank",
        "address1" => $address,
        "phone" => $phone,
        "city" => "blank",
        "province" => "blank",
        "country" => "blank",
        "zip" => "blank"
      ],
      "shipping_address"=> [
        "first_name"=> $name,
        "last_name"=> "blank",
        "address1"=> $address,
        "phone"=> $phone,
        "city"=> "blank",
        "province"=> "blank",
        "country"=> "blank",
        "zip"=> "blank"
      ],
      "financial_status" => "pending",
);

$shopify->Order->post($order);


echo "order done!";
}

?>