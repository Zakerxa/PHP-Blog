<?php
include "./config/config.php";

if (isset($_COOKIE['id'])) {
     $content = $_POST['msg'];
     $id      = $_POST['id'];

     $stmt    = $pdo->prepare("INSERT INTO comments(content,author_id,post_id,img,created_date) VALUE (?,?,?,'',?)");
     $result  = $stmt->execute([escape($content), $_COOKIE['id'], $id, $ygntime]);

     if ($result) {
          echo "Completed";
     } else {
          echo "Error";
     }
}
