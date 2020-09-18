<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "dfbdc64f7a0b4f13f5c33520e52146f7";
$scopes = 'read_products,write_products,read_script_tags,write_script_tags, read_orders, write_orders';
$redirect_uri = "https://getorder.herokuapp.com/install.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();

?>