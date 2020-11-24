<?php
session_start();

$variantId = $_GET['variantid'];
if (!isset($variantId))
{
  echo "please put a regular product link";
  exit();
}

require __DIR__ . '/vendor/autoload.php';
$config = array(
  'ShopUrl' => 'https://zinniatic.myshopify.com/',
  'ApiKey' => 'e29918eda1e541b915c2b38eacef328e',
  'Password' => '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',
);



$shopify = new PHPShopify\ShopifySDK($config);

$products = $shopify->Product->get();


    $order = array (
      "order" => [
        "email" => $_POST['email'],
        "fulfillment_status" => "fulfilled",
        "send_receipt" => true,
        "send_fulfillment_receipt" => true,
        "line_items" => [
          [
            "variant_id" => $variantId,
            "quantity" => 1
          ]
        ]
          ],
      "customer" => [
        "first_name" => $_POST['name'],
        
        "email" => $_POST['email']
      ],
      "billing_address" => [
        "first_name" => $_POST['name'],
        
        "address1" => $_POST['address'],
        "phone" => $_POST['phone'],
        "city" => "null",
        "province" => "null",
        "country" => "null",
        "zip" => "null"
      ],
      "shipping_address"=> [
        "first_name"=> $_POST['name'],
        "address1"=> $_POST['address'],
        "phone"=> $_POST['phone'],
        "city"=> "null",
        "province"=> "null",
        "country"=> "null",
        "zip"=> "null"
      ]
);

$shopify->Order->post($order);


echo "order done!";
function filtered($var)
{
    // returns whether the input integer is even
    return $var["handle"] == "its-a-test-1";
}

$product = $shopify->Product()->get();

$product = array_filter($product, "filtered");
// print_r($product);


// $list = array(
//     'status' => 'any',
// );
// $orders = $shopify->Order->get($list);

// print_r($orders);
// // exit();
?>