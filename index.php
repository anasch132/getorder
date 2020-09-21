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
  'ShopUrl' => 'woodecorshop.myshopify.com',
  'ApiKey' => '611381deaed2660dfdc8645ce603dc0c',
  'Password' => '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',
);



$shopify = new PHPShopify\ShopifySDK($config);

$products = $shopify->Product->get();

if (isset($_POST['submit']))
{

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buy now</title>
</head>
<body>

<form method="post">
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
</html>
