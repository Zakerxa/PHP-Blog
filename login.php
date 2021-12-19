<?php
session_start();
require "./config/config.php";
require_once "FacebookLogin/config.php";

$floginURL = $helper->getLoginUrl($redirectURL, $permissions);

$err_login = "";
  
 //  Site Logo
 $sitestmt = $pdo->prepare("SELECT * FROM site");
 $site = $sitestmt->execute();
 $site = $sitestmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['login-btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmtlogin = $pdo->prepare("SELECT * FROM users WHERE name=:name");
    $userlogin = $stmtlogin->execute(
      array(':name'=>escape($username))
    );
    $userlogin = $stmtlogin->fetch(PDO::FETCH_ASSOC);

    if($userlogin){

       $name = $userlogin['name'];
       $id   = $userlogin['id'];
       $pass = $userlogin['password']; 
       
        if (!hash_equals($_SESSION['token'], $_POST['token'])){
               header("location:./login.php");
               die();
        }else{
            
            if(password_verify($password, $pass)) {
               setcookie("name", $name, time() + 60 * 60 * 24 * 30);
               setcookie("id", $id, time() + 60 * 60 *24 * 30);	
                unset($_SESSION['token']);
               header("location:index.php");
           }else{
              setcookie("name", "", time()-1);
              setcookie("id", "", time()-1);
              $err_login = "Incorrect password . . .";
           }
           
        }

      

    }else{
       setcookie("name", "", time()-1);
       setcookie("id", "", time()-1);
       $err_login = "Username doesn't exist . . .";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./assets/link.php";?>
    <title>Admin</title>
    <style>
      body{
        background-color: #93abe6;
        background-image: linear-gradient(0deg, #93abe6 0%, #88c5e0 100%);
      }
    </style>
</head>
<body>

<?php include('nav.php')?>
    <div class="container">
      <div class="row justify-content-center d-flex align-items-center" style="height:100vh">
        <div class="col-11 shadow card col-md-8 col-lg-4 text-center pt-4 pb-4" style="border-radius: 20px;">
         <h4 class="fw-bold pb-3">LogIn</h4>

              <small class="text-danger">
                  <b style="letter-spacing: 1px;"><?php if ($err_login != ''); echo "$err_login"?></b>
              </small>

          <form action="" method="POST" class="row justify-content-center">
             <input name="token" type="hidden" value="<?=$_SESSION['token'];?>">
               <li class=" list-unstyled border-bottom pt-2">
               
                <div class="col-12 mb-1">
                   <i class="fa fa-user text-muted"></i><input name="username" spellcheck="false" class="border-0 p-2 pl-3" placeholder="Username" style="outline: none;" type="text" required>
                </div>
               </li>
               
               
               <li class=" list-unstyled mt-3 border-bottom">
                
                <div class="col-12 mb-1">
                   <i class="fa fa-lock text-muted"></i><input name="password" spellcheck="false" class="border-0 p-2 pl-3" placeholder="Password" style="outline: none;" type="password" required>
                </div>
               </li>
               
               <li class="col-10 list-unstyled mt-2 pt-3 pb-3">
                <div class="text-center">
                  <button name="login-btn"  class="btn btn-dark border-0 pt-2 pb-2 w-100 shadow fw-bold text-light">LogIn</button>
                </div>
               </li>

               <li class="col-10 list-unstyled pt-1">
                     <div class="text-center">
                       <button type="button" onclick="window.location = '<?php echo $floginURL ?>';" style="letter-spacing: 0.2px;" class="btn w-100 pt-2 pb-2 bg-primary fw-bold text-light shadow disabled"><img style="width: 24px;border-radius:20px" src="assets/flogo.png" alt=""> Sign In With Facebook</button>
                    </div>
                  </li> 
               
      

          </form>

           <p class="pt-2">Don't have an Account? <a href="register.php" class="text-success fw-bold">Register</a></p>
        
        </div>
       
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

