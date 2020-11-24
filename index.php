<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
$config = array(
  'ShopUrl' => 'https://zinniatic.myshopify.com/',
  'ApiKey' => 'e29918eda1e541b915c2b38eacef328e',
  'Password' => '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',
);



$shopify = new PHPShopify\ShopifySDK($config);

$products = $shopify->Product->get();

if (isset($_POST['submit']))
{

    echo "hereeeeeeeee";
    $order = array (
      "order" => [
        "email" => $_POST['email'],
        "fulfillment_status" => "fulfilled",
        "send_receipt" => true,
        "send_fulfillment_receipt" => true,
          ],
          "line_items" => [
            [
              "variant_id" => "34753233387686",
              "quantity" => 1
            ]
            ],
      "customer" => [
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "emal" => $_POST['email']
      ],
      "billing_address" => [
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "address1" => $_POST['address1'],
        "phone" => $_POST['phone'],
        "city" => $_POST['city'],
        "province" => $_POST['province'],
        "country" => $_POST['country'],
        "zip" => $_POST['zip']
      ],
      "shipping_address"=> [
        "first_name"=> $_POST['first_name'],
        "last_name"=> $_POST['last_name'],
        "address1"=> $_POST['address1'],
        "phone"=> $_POST['phone'],
        "city"=> $_POST['city'],
        "province"=> $_POST['province'],
        "country"=> $_POST['country'],
        "zip"=> $_POST['zip']
      ]
);



$shopify->Order->post($order);


echo "order done!";
}
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
foreach ($product as $oneorder)
{
   foreach($oneorder as $elem)
   {
    print($elem);
    echo "<br>";
   }
    // print($oneorder[0]);
   echo "<br><br>--------------------------------------------<br>";
    
}

?>
