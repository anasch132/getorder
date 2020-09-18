<?php
session_start();


require __DIR__ . '/vendor/autoload.php';

$config = array(
    'ShopUrl' => '611381deaed2660dfdc8645ce603dc0c',
    'ApiKey' => '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',
    'SharedSecret' => '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',
);

$scopes = 'read_products,write_products,read_script_tags,write_script_tags, read_orders, write_orders';
//This is also valid
//$scopes = array('read_products','write_products','read_script_tags', 'write_script_tags'); 
$redirectUrl = 'https://getorder.herokuapp.com/index.php';

\PHPShopify\AuthHelper::createAuthRequest($scopes, $redirectUrl, null, null, true);

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
        "email" => $_POST['email']
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
exit();
}
// $list = array(
//     'status' => 'open',
//     'created_at_min' => '2016-06-25T16:15:47-04:00',
//     'fields' => 'email, id, phone'
// );
// $orders = $shopify->Order->get($list);


// print_r($orders);


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
