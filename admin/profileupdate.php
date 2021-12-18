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

 $stmt = $pdo->prepare("SELECT * FROM users WHERE id=1");
 $admin = $stmt->execute();
 $admin = $stmt->fetch(PDO::FETCH_ASSOC);

 if(isset($_POST['update-admin'])){

  $adminame = $_POST['name'];
  $pass     = $_POST['pass'];
  $cpass    = $_POST['cpass'];

 
    if($pass == $cpass){

      $token       = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789qwertyuiopasdfghjklzxcvbnm';
      $token       = str_shuffle($token);
      $token       = substr($token,0,12);
  
      if(empty($adminame)){
        $adminame = $admin['name'];
      }
  
      if(empty($pass)){
        $pass = $admin['password'];
      }

      $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
  
      $stmt    = $pdo->prepare("UPDATE users SET name='$adminame', password='$hashed_password', pic='$token' WHERE id=1");
      $result  = $stmt->execute();
  
  
      if($result){
         setcookie("oauth" ,"$adminame", time() + 60 * 60 * 24 * 3);
         setcookie("token", "$token",time() + 60 * 60 * 24 * 3);
         header("location:profileview.php");
      }
  
    }else{
       echo "<script>alert('Password are not match.');location.href='profileupdate.php';</script>";
       exit();
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

        <div class="row justify-content-center">   
          <div class="col-lg-12">
           <div class="alert alert-success" role="alert">

               <h5 class="alert-heading " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">ရှင်းလင်းချက် !</h5>
                <div id="collapseOne" class="collapse pt-2">
                  <p>Username အသစ်ပြောင်းလဲရန်လိုအပ်ပါသည်။Password မပြောင်းလိုပါက New Password နဲ့ Confirm Password နေရာ တွင်ချန်လှပ်ထားနိုင်သည်။</p>
                  <hr>
                  <p class="mb-0">Username သို့မဟုတ် Password ချိန်းပြီးပါက တစ်ခြား Login ၀င်ခဲ့သော Device များ၌ Logout ဖြစ်သွားမည်ဖြစ်သည်။</p>
                </div>
             </div>
          </div>

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
                <form action="" method="post">
                <input name="token" type="hidden" value="<?=$_SESSION['token'];?>">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header pb-2">Username <span title="Username require" class="text-danger" style="cursor: pointer;">*</span></h5>
                       <input style="border-radius:5px;" placeholder="New Username" class="pl-2 border-0 pt-1 pb-1" type="text" name="name" value="" id="" required>
                    </div>
                    <!-- /.description-block -->
                  </div>    
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header pb-2">New Password</h5>
                      <input style="border-radius:5px;" placeholder="* * * * *" class="pl-2 border-0 pt-1 pb-1" type="password" name="pass" value="" id="">
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header pb-2">Confirm Password</h5>
                      <input style="border-radius:5px;" placeholder="* * * * *" class="pl-2 border-0 pt-1 pb-1" type="password" name="cpass" value="" id="">
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-sm-12 pt-3">
                    <div class="description-block">
                      <button class="btn w-75 text-light" name="update-admin" type="submit" style="border-radius: 12px;background:#111;">Update</button>
                    </div>
                    <!-- /.description-block -->
                  </div> 
                </div>
                </form>
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