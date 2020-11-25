<?php
session_start();

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
    $order = array (
      "phone"=> $_GET['phone'],
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
        "first_name" => $_GET['name'],
        "last_name" => "blank",
        "emal" => $_GET['email']
      ],
      "billing_address" => [
        "first_name" => $_GET['name'],
        "last_name" => "blank",
        "address1" => $_GET['address'],
        "phone" => $_GET['phone'],
        "city" => "blank",
        "province" => "blank",
        "country" => "blank",
        "zip" => "blank"
      ],
      "shipping_address"=> [
        "first_name"=> $_GET['name'],
        "last_name"=> "blank",
        "address1"=> $_GET['address'],
        "phone"=> $_GET['phone'],
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
// function filtered($var)
// {
//     // returns whether the input integer is even
//     return $var["handle"] == "its-a-test-1";
// }

// $product = $shopify->Product()->get();

// $product = array_filter($product, "filtered");
// // print_r($product);


// // $list = array(
// //     'status' => 'any',
// // );
// // $orders = $shopify->Order->get($list);

// // print_r($orders);
// // // exit();
// foreach ($product as $oneorder)
// {
//    foreach($oneorder as $elem)
//    {
//     print($elem);
//     echo "<br>";
//    }
//     // print($oneorder[0]);
//    echo "<br><br>--------------------------------------------<br>";
    
// }

?>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buy now</title>
</head>
<body>

<form method="get">
<input type="text" name="first_name" placeholder="first_name"> </input>
<input type="text" name="last_name" placeholder="last_name"> </input>
<input type="text" name="address1" placeholder="address1"> </input>
<input type="text" name="email" placeholder="email"> </input>
<input type="text" name="phone" placeholder="phone"> </input>
<input type="text" name="city" placeholder="city"> </input>
<input type="text" name="province" placeholder="province"> </input>
<input type="text" name="zip" placeholder="zip"> </input>
<input type="text" name="country" placeholder="country"> </input>
<input type="submit" name="submit" value="order now"></input>


</form>
    
</body>
</html> -->