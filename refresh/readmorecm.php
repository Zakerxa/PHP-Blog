<?php 
include "../config/config.php";
include "../admin/tnc.php";

session_start();
$id =  $_SESSION['post_id'];
$cmnewcount = $_POST['cmnewcount'];

  // Get Post comments by id
  $stmtcm = $pdo->prepare("SELECT * FROM comments WHERE post_id=$id ORDER BY id DESC LIMIT $cmnewcount");
  $stmtcm->execute();
  $cmResult = $stmtcm->fetchAll();
  
  $auResult = [];
  
  // If the post have comments
  if($cmResult){
    // Loop all comments
    foreach($cmResult as $key => $value){
      $author_id = $cmResult[$key]['author_id'];
      $stmtauth = $pdo->prepare("SELECT * FROM users WHERE id=$author_id");
      $stmtauth->execute();
      $auResult[] = $stmtauth->fetchAll();
    }
  }

?>

<div class="card-comment" id="comments">
                             
 <?php if($cmResult){ 
   foreach($cmResult as $key => $value)  { ?>
   <div class="comment-text" style="margin-left: 8px!important;">
      <span class="username">

        <?php if(!empty($auResult[$key][0]['pic'])){ ?> 
           <img class="img-circle img-sm mr-1" src="<?=$auResult[$key][0]['pic']?>" alt="">
        <?php }else{ ?>
          <img class="img-circle img-sm mr-1" src="./registeruser.png" alt="">
        <?php } ?>

        <?=$auResult[$key][0]['name']?>
        <span class="text-muted float-right"><?=dnc($value['created_date'])?></span>
      </span><!-- /.username -->
      <p class="pl-2"><?=$value['content'];?></p>
     
    </div>    
 <?php } } ?> 
               
</div>