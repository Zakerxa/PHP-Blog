<?php
    //  if(!session_id()) {
    //     session_start();
    // }
    // session_start();
	require_once "Facebook/autoload.php";
   
	$FB = new \Facebook\Facebook([
		'app_id' => '503656240628058',
		'app_secret' => 'dd356b05cdb7373eb97898cac896c115',
		'default_graph_version' => 'v2.10',
		'persistent_data_handler'=>'session'
	]);

	$helper = $FB->getRedirectLoginHelper();
   	if (isset($_GET['state'])) {
       $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }
	$redirectURL = "https://zakerxa.com/fb-callback.php";
	$permissions = ['public_profile','email'];

?>