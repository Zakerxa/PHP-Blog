<?php
   session_start();
	require_once "FacebookLogin/config.php";
	
	unset($_SESSION['access_token']);
	// $gClient->revokeToken();
	session_destroy();
	setcookie("name", "", time() - 30);
	setcookie("id", "", time() - 30);
	header('Location: index.php');
	exit();
?>