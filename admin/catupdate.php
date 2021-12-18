<?php
 session_start();
 error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";
 
 if(isset($_POST['add-cat'])){
    $category = $_POST['category'];

    if(empty($category)){
        echo "<script>alert('Insert Something');window.location.href='add-cat.php';</script>";
        exit();
    }else{
       $stmt = $pdo->prepare("INSERT INTO categories(name) VALUE('$category')");
       $done = $stmt->execute();
   
       if($done){
           header("location:cat-list.php");
       }
    }
 }
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
          
        <?php include("./dashboard.php") ?>
    
     
         <form action="" method="POST" class="row mb-5 justify-content-center">
             <div class="col-12 pb-3">
               <hr>
                <h4 class="font-weight-bold text-monospace">Add New Category</h4>
             </div>
              <div class="input-group mb-2 col-12 col-md-8 col-lg-7 ">
                <input type="text" name="category" class="form-control w-25 border-0 pl-2"  placeholder="Category Name" style="border-top-left-radius:12px;border-bottom-left-radius:12px;outline:none;" aria-label="name">
                <div class="input-group-prepend">
                  <button class="input-group-text bg-dark border-0 pt-2" name="add-cat" type="submit" style="border-top-right-radius:12px;border-bottom-right-radius:12px;outline:none;">Add New</button>
                </div>
              </div>

          </form>
        

      </div><!-- /.container-fluid -->
    </div>
   
   </div>

   <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=date("Y") ?> Zakerxa.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
  

</div>
<?php 
  include("../assets/script.php");
  include("adminlte/ltebotscript.php");
?>
</body>
</html>