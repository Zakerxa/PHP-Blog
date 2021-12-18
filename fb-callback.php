<?php
    include "./config/config.php";
	session_start();
	require_once "FacebookLogin/config.php";

	try {
		$accessToken = $helper->getAccessToken();
	} catch (\Facebook\Exceptions\FacebookResponseException $e) {
		echo "Response Exception: " . $e->getMessage();
		exit();
	} catch (\Facebook\Exceptions\FacebookSDKException $e) {
		echo "SDK Exception: " . $e->getMessage();
		exit();
	}

	if (!$accessToken) {
		header('Location: index.php');
		exit();
	}

	$oAuth2Client = $FB->getOAuth2Client();
	if (!$accessToken->isLongLived())
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

	$response = $FB->get("/me?fields=id, name,email,link,gender, picture.type(large)", $accessToken);
	$userData = $response->getGraphNode()->asArray();
	$_SESSION['userData'] = $userData;
	$_SESSION['access_token'] = (string) $accessToken;


	$name     = $_SESSION['userData']['name'];
	$mail     = $_SESSION['userData']['email'];
	$picture  = $_SESSION['userData']['picture']['url'];
	$password = $_SESSION['userData']['id'];

	$check = $pdo->prepare("SELECT * FROM users WHERE password = '$password'");
	$row   =  $check->execute();
	$row   = $check->fetch(PDO::FETCH_ASSOC);
	$userid = $row['id'];
	
	if($row['password'] == $password){

		setcookie("name", $name, time() + 60 * 60 * 24 * 7);	
		setcookie("id", $userid, time() + 60 * 60 *24 * 7);	

		$update = $pdo->prepare("UPDATE users SET name = '$name', email = '$mail', pic = '$picture' WHERE id = '$customer_id'");
		$update->execute();
		if($update){

		}else{
			echo "Error Login";
			exit();
		}
	}else{
		$adduser = $pdo->prepare("INSERT INTO users (name, email, password, pic, role) VALUES ('$name', '$mail', '$password', '$picture', '0')");
		$adduser->execute();
		
		if($adduser){
		   setcookie("name", $name, time() + 60 * 60 * 24 * 7);
		   setcookie("id", $userid, time() + 60 * 60 *24 * 7);	
		}else{
		   header("location:register.php");
		   exit();
		}

	}
	
	header('Location: index.php');

	exit();
?>