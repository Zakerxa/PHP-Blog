<?php
 session_start();
 error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      include("adminlte/ltetopscript.php"); 
      include("../assets/link.php");
    ?>
    <title>Admin Panel</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
   <?php include("adminlte/nav.php");?>
 
   <div class="content-wrapper" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">

        <?php include("./dashboard.php")?>

        <div class="row">
          <div class="col-12 pb-3">
            <hr>
             <h4 class="font-weight-bold text-monospace">Category List</h4>
          </div>
           <?php
               $stmt = $pdo->prepare("SELECT * FROM categories ORDER BY id DESC");
               $stmt->execute();
               $result = $stmt->fetchAll();
               if($result){
                 $i = 1;
                 foreach($result as $value){ 
           ?>
                <div class="card col-12 col-lg-6 offset-lg-1 shadow">
                 
                   <div class="row p-2">
                       <div class="col-10 pt-1">
                       <?=$i?> <?=substr($value['name'],0,50)?>
                       </div>
                       <div class="col-2 text-center pr-0">
                         <a href="delete/delete-cat.php?id=<?=$value['id']?>" title="Delete this Category" onclick="return confirm('Are you sure you want to delete this category?');" class="float-right btn btn-dark fa fa-trash"></a>
                       </div>
                   </div>
      
                </div>
          
            <?php $i++;
                }  
              } 
            ?>

        </div>

      </div><!-- /.container-fluid -->
    </div>
   
   </div>

   <!-- /.content-wrapper -->
  <footer class="main-footer">
  <div class="">
     <strong>Copyright &copy; <?=date('Y')?> Zakerxa.</strong>
      All rights reserved.
   </div>
  </footer>
  

</div>
<?php 
  include("../assets/script.php");
  include("adminlte/ltebotscript.php");
?>
</body>
</html>