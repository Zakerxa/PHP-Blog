<?php
    //  if(!session_id()) {
    //     session_start();
    // }
    // session_start();
	require_once "Facebook/autoload.php";
   
	$FB = new \Facebook\Facebook([
		'app_id' => '424036802116348',
		'app_secret' => 'a29683e65260d62aafcb997bf4ef9e9a',
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