<?php

// Set variables for our request
$shop = $_GET['shop'];

$api_key = "830ae20c17e6e1a01792b5d67a3ba935";
$scopes = 'read_products,write_products,read_script_tags,write_script_tags, read_orders, write_orders';
$redirect_uri = "https://getorder.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();

?>