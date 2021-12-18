<?php
 session_start();
 // Turn off error reporting
 error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";
 
 $siteview = $pdo->prepare("SELECT * FROM site WHERE id=1");
 $sview    = $siteview->execute();
 $sview    = $siteview->fetch(PDO::FETCH_ASSOC);
 
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
 
   <div class="content-wrapper" id="admin" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <?php include("./dashboard.php") ?>

        <div class="row justify-content-center d-flex align-items-center">   
            <?php if($sview){ ?>
               <div class="col-12 col-lg-4">
                   <img src="../images/<?=$sview['logo']?>" class="w-100" alt="">
               </div>
               <div class="col-12 pt-3 pt-lg-0 col-lg-8 text-center"  >
                   <div class="">
                       Site Name
                   </div>
                   <h3><?=$sview['sitename']?></h3>
               </div>
            <?php  }  ?>      
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