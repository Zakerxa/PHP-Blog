<?php
 session_start();
 // Turn off error reporting
 error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";

 $stmt = $pdo->prepare("SELECT * FROM users WHERE id=1");
 $admin = $stmt->execute();
 $admin = $stmt->fetch(PDO::FETCH_ASSOC);

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

        <div class="row justify-content-center">   
        <div class="col-lg-8 mt-3">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Admin Profile</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../photo/preview.gif" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <h5 class="description-header pb-2">USERNAME</h5>
                      <span class=""><?=$admin['name']?></span>
                    </div>
                    <!-- /.description-block -->
                  </div>    
                  <!-- /.col -->
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <h5 class="description-header pb-2">PASSWORD</h5>
                      <span class="">* * * * * * * * * *</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-sm-12 pt-3">
                    <div class="description-block">
                       <a href="profileupdate.php">
                         <h5 class="description-header  btn btn-success fas fa-cogs pb-2"> Edit</h5>
                       </a>
                    </div>
                    <!-- /.description-block -->
                  </div> 
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
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