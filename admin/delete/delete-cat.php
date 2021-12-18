<?php
  include("../../config/config.php");
  $id   = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM categories WHERE id='$id'");
  $done = $stmt->execute();

  if($done){
     header("location:../cat-list.php");
     exit();
  }else{
    echo "<script>alert('Error');location.href='../cat-list.php';</script>";
  }