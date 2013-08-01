<?php

function __autoload($classname){
	$classes = explode("\\", $classname);

	$last_class = $classes[count($classes) - 1];
	require "../src/{$last_class}.class.php";
}

date_default_timezone_set('America/New_York');

use FetchApp\API\FetchApp;

// Create a new FetchApp instance
$fetch = new FetchApp();

// Set the Authentication data (needed for all requests)
$fetch->setAuthenticationKey("demokey");
$fetch->setAuthenticationToken("demotoken");
try{
// Let's grab our Account data to make sure that everything is working!
	$products = $fetch->getProducts();

}
catch (Exception $e){
// This will occur on any call if the AuthenticationKey and AuthenticationToken are not set.
    echo $e->getMessage();
}
