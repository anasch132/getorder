<?php
session_start();
header("Access-Control-Allow-Origin: *");

$variantId = $_GET['variantid'];
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
  $city = $_GET['city'];

    $order = array (
      "phone" => $phone,
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
        "last_name" => "",
      ],
      "billing_address" => [
        "first_name" => $name,
        "last_name" => "",
        "address1" => $address,
        "phone" => $phone,
        "city" => $city,
        "province" => "",
        "country" => "",
        "zip" => ""
      ],
      "shipping_address" => [
        "first_name"=> $name,
        "last_name"=> "",
        "address1"=> $address,
        "phone"=> $phone,
        "city"=>  $city,
        "province"=> "",
        "country"=> "",
        "zip"=> ""
      ],
      "financial_status" => "pending",
      "note" => "nom: ".$name."\n phone: ".$phone."\n address: ".$address."\n city: ".$city,
);

$shopify->Order->post($order);


echo json_encode("order done!");
}

?>