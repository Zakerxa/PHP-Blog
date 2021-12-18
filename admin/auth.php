<?php
  $adminauth = $pdo->prepare("SELECT * FROM users WHERE id=1");
  $authadmin = $adminauth->execute();
  $authadmin = $adminauth->fetch(PDO::FETCH_ASSOC);  
  $name = $authadmin['name'];
  $token =  $authadmin['pic'];
    
  if(empty($_COOKIE['oauth'])){
    header("Location: login.php");
  }
 
  if(($_COOKIE['oauth'] == "$name") && ($_COOKIE['token'] == "$token")){
  
  }else{
    header("Location: login.php");
  }

