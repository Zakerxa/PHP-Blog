<?php
 session_start();
 require "../config/config.php";

 $err_login = "";

 if($_SERVER['REQUEST_METHOD'] === 'POST' ){

  if (!hash_equals($_SESSION['token'], $_POST['token'])){
       header("location:./login.php");
       die();
  }else{

    if(isset($_POST['admin-btn'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $stmt = $pdo->prepare("SELECT * FROM users WHERE id=1");
      $user = $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $name = $user['name'];
      $pass = $user['password'];
      $token =  $user['pic'];
      
      if(password_verify($password, $pass)) {
        
         setcookie("oauth" ,"$name", time() + 60 * 60 * 24 * 30);
         setcookie("token", "$token",time() + 60 * 60 * 24 * 30);
         unset($_SESSION['token']);
         header("location:index.php");
      }else{
        setcookie("oauth", "", time() - 1);
        setcookie("token", "", time() - 1);
        $err_login = "Username & Password Incorrect . . .";
      }
   
    }
     
  }
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../assets/link.php"); ?>
    <title>Admin</title>
    <style>
      body{
        background-image: linear-gradient(-225deg, #22E1FF 0%, #1D8FE1 48%, #625EB1 100%);
      }
    </style>
</head>
<body>
    <div class="container">
      <div class="row justify-content-center d-flex align-items-center" style="height:100vh">
        <div class="col-12 col-md-8 col-lg-6 text-center p-3 ">
        <img src="../photo/preview.gif" class="w-25 mb-3" alt="" style="border-radius: 100px;">
          <form action="" method="POST" class="row justify-content-center">
          <input name="token" type="hidden" value="<?=$_SESSION['token']?>">
              <div class="input-group mb-2 col-md-7 col-lg-7">
               
                <input type="text" name="username" class="form-control bg-light border-0 pl-0" style="border-radius:10px;outline:none;" placeholder="Username" aria-label="Username">
              </div>

              <div class="input-group mb-3 col-md-7 col-lg-7">

                <input type="password" name="password" class="form-control bg-light border-0 pl-0" style="border-radius:10px;outline:none;" placeholder="Password" aria-label="Password">
              </div>

              <div class="col-md-7 col-lg-7">
                  <button class="btn w-100 text-light" name="admin-btn" style="border-radius: 12px;background:#111;">LogIn</button>
              </div>

              <div class="col-md-7 col-lg-7 mt-2 text-center">
                    <small class="text-danger font-weight-bold mt-2"><?php if($err_login != ''); echo "$err_login" ?></small>
               </div>

          </form>
        </div>
      </div>
    </div>

<?php include("../assets/script.php"); ?>
</body>
</html>

