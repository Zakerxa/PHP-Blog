<?php
 session_start();
 // Turn off error reporting
 error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";

 if($_SERVER['REQUEST_METHOD'] === 'POST' ){

  if (!hash_equals($_SESSION['token'], $_POST['token'])){
      echo "Invalid CSRF Token !";
      die();
  }else{
      unset($_SESSION['token']);
  }
}

 $siteview = $pdo->prepare("SELECT * FROM site WHERE id=1");
 $supdate    = $siteview->execute();
 $supdate    = $siteview->fetch(PDO::FETCH_ASSOC);

 if(isset($_POST['edit-site'])){

    $sitename    = $_POST['sitename'];
    $logo        = $_FILES['logo']['name'];
    $FileTypeone = $_FILES['logo']['type'];
    $oldimgone   = $supdate['logo'];

    // Get file from input 1
    if(!empty($logo)){ 
        if($FileTypeone == "image/jpeg" || $FileTypeone == "image/png" || $FileTypeone == "image/jpeg"){
          if(empty($oldimgone)){

          }else{
              unlink("../images/$oldimgone");
          }
           move_uploaded_file($_FILES['logo']['tmp_name'], "../images/$logo"); //Add a new photo to  folder      
        }else{
           echo "<script>alert('Error, Image must be img,jpg & png.');location.href='siteupdate.php';</script>";
           exit(); 
        }
    }else{
       $logo = $oldimgone;
    }
    
    $stmt    = $pdo->prepare("UPDATE site SET sitename='$sitename', logo='$logo' WHERE id=1");
    $result  = $stmt->execute();
   
    if($result){
        header("location:siteview.php");
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
 
   <div class="content-wrapper" id="admin" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <?php include("./dashboard.php") ?>

              <!-------- Add Product Overlay ------------->
       <div class="row justify-content-center " >  
         <div class="col-12 pb-3">
            <hr>
             <h4 class="font-weight-bold text-monospace">Update Site</h4>
          </div>
                <div class="col-12">
                    <form action="" class="addproduct_style"  enctype="multipart/form-data" method="post">
                    <input name="token" type="hidden" value="<?=$_SESSION['token'];?>">
                      <ul class="list-unstyled mt-1">
                          <li class="pt-2">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-one-preview" src="../images/<?=$supdate['logo']?>?>" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgone" onchange="PreviewImage_one();" type="file" name="logo" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>
                        
                        <li class="pt-2 mt-2">
                            <textarea class="small p-1 pt-2 pb-2 border-0 bg-light w-100" spellcheck="false" placeholder="T i t l e" name="sitename" id="" cols="10" rows="1"><?=$supdate['sitename']?></textarea>           
                        </li>
               
                        <li class="col-12 text-center pb-3 pt-2" style="top:0px;right:10px;">
                            <button  class="btn w-75 btn-success mt-3 upload font-weight-bold" name="edit-site">Update Site</button>
                        </li>

                      </ul>
                    </form>
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
<script>
   function PreviewImage_one() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgone").files[0]);

    reader.onload = function (oFREvent) {
        document.getElementById("photo-one-preview").src = oFREvent.target.result;
    };
   }

</script>

</body>
</html>