<?php

	session_start();
	ob_start();

	// HIDE ERRORS FOR PROD
	error_reporting(0);
	ini_set('display_errors', 0);

	// Loads autoload
	require_once "../vendor/autoload.php";
	
	$route = new \App\Route;

?>	