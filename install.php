<?php

session_start();


if (isset($_POST['submit']))
{
if (strcmp($_POST['password'], "admin132admin1996") == 0)
{

// Set variables for our request
$shop = $_GET['shop'];




$api_key = "830ae20c17e6e1a01792b5d67a3ba935";
$scopes = 'read_products,write_products,read_script_tags,write_script_tags, read_orders, write_orders';
$redirect_uri = "https://getorder.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop .  ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
}

else{
    echo "wrong pass ,  please ask admin of this app";
}
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>installation page</title>
</head>
<body>
    <form method="post">
    <input type="password" name="password">
    <input type="submit" name="submit" value="install">
    </form>
</body>
</html>