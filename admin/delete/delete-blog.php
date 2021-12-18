<?php
  include("../../config/config.php");
  $id    = $_GET['id'];
  $stmto = $pdo->prepare("SELECT * FROM blogs WHERE id='$id'");
  $done  = $stmto->execute();
  $done  = $stmto->fetch(PDO::FETCH_ASSOC);

  $one   = $done['pimg'];
  $two   = $done['fimg'];
  $three = $done['simg'];
  $four = $done['timg'];
  $five = $done['foimg'];
  $path  = $done['blog_id'];

  if(!empty($one)){
    unlink("../../images/$path/$one");
  }

  if(!empty($two)){
    unlink("../../images/$path/$two");
  }

  if(!empty($three)){
    unlink("../../images/$path/$three");
  }

  if(!empty($four)){
    unlink("../../images/$path/$four");
  }

  if(!empty($five)){
    unlink("../../images/$path/$five");
  }

  rmdir("../../images/$path");
  

  $stmt = $pdo->prepare("DELETE FROM blogs WHERE id='$id'");
  $del  = $stmt->execute();

  $cm  = $pdo->prepare("SELECT * FROM comments WHERE post_id='$id'");
  $checkcm = $cm->execute();
  $checkcm = $cm->fetchAll();

  if($checkcm){
     $stmtcm = $pdo->prepare("DELETE FROM comments WHERE post_id='$id'");
     $delcm  = $stmtcm->execute();
  }
  
  if($del){
     header("location:../index.php");
     exit();
  }else{
    echo "<script>alert('Error');location.href='../index.php';</script>";
  }