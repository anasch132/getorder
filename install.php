<?php

// Set variables for our request
$shop = $_GET['shop'];

$api_key = "611381deaed2660dfdc8645ce603dc0c";
$scopes = 'read_products,write_products,read_script_tags,write_script_tags, read_orders, write_orders';
$redirect_uri = "https://getorder.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();

?>