<?php 

date_default_timezone_set("Asia/Yangon");   

/*** MySQL hostname ***/
$hostname = 'localhost';
/*** MySQL dbname ***/
$dbname   =  'blog_technic';
/*** MySQL username ***/
$username = 'root';
/*** MySQL password ***/
$password = 'Pass@1234';

function testdb_connect ($hostname,$dbname, $username, $password){
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    return $pdo;
}

try {
    $pdo = testdb_connect ($hostname,$dbname, $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
}


$diffWithGMT=6*60*60+30*60; //converting time difference to seconds.
$dateFormat="Y-m-d H:i:s";
$ygntime=gmdate($dateFormat, time()+$diffWithGMT);//time() function returns the current time measured in the number of seconds since the Unix Epoch. 

function escape($html) {
	return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

if (empty($_SESSION['token'])) {
	if (function_exists('random_bytes')) {
		$_SESSION['token'] = bin2hex(random_bytes(32));
	} else {
		$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
	}
}

$http = 'http://';
