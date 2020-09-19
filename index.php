<?php
session_start();


require __DIR__ . '/vendor/autoload.php';
$config = array(
  'ShopUrl' => 'manageorder.myshopify.com',
  'ApiKey' => '15c1f02e9423589aa54d9d44a0b0ac90',
  'Password' => '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',
);



$shopify = new PHPShopify\ShopifySDK($config);

$products = $shopify->Product->get();

if (isset($_POST['submit']))
{

    $order = array (
        "line_items" => [
        [
          "variant_id" => 34711827677342,
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


$list = array(
    'status' => 'any',
);
$orders = $shopify->Order->get($list);

// print_r($orders);
// exit();
foreach ($orders as $oneorder)
{
    print($oneorder['id']);
    echo "  ";
    print($oneorder['email']);
    echo "<br>";
    
}

?>


<!-- <!DOCTYPE html>
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
</html> -->
