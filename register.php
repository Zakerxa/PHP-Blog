<?php
session_start();
require "./config/config.php";
require_once "FacebookLogin/config.php";

// Facebook Login 
$floginURL = $helper->getLoginUrl($redirectURL, $permissions);

$err_login = "";

 //  Site Logo
 $sitestmt = $pdo->prepare("SELECT * FROM site");
 $site = $sitestmt->execute();
 $site = $sitestmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['signup-btn'])) {

    $username = $_POST['username'];
    $password = $_POST['pass'];
    $mail     = $_POST['mail'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
    if(empty($username)){
      $err_login = "Did you miss something . . .";
    }

    if(empty($password)){
      $err_login = "Did you miss something . . .";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $err_login = "Only letters and white space allowed";
    }else{

       $stmt = $pdo->prepare("SELECT * FROM users WHERE name=:username");
       $user = $stmt->execute(
         array(':username'=>escape($username))
       );
   
       $user = $stmt->fetchAll();
  
      if($user){
        $err_login = "Username already exist !";
      }else{
        if(empty($err_login)){

          
          $stmtsignup = $pdo->prepare("INSERT INTO users(name,email,password,role) VALUE (:username,:email,:password,:role)");
          $adduser = $stmtsignup->execute(
            array(':username'=>escape($username),':email'=>escape($mail),':password'=>escape($hashed_password),':role'=>0)
          );
  
          if ($adduser) {
            header("location:login.php");
          }
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

<?php include("./nav.php")?>

    <div class="container">
      <div class="row justify-content-center d-flex align-items-center" style="height:100vh">
        <div class="col-11 shadow card mt-5 col-md-8 col-lg-4 text-center pt-4 pb-4" style="border-radius: 20px;">
         <h4 class="font-weight-bold pb-3">Register</h4>

            <small class="text-danger">
                 <b style="letter-spacing: 1px;"><?php if ($err_login != ''); echo "$err_login"?></b>
             </small>

          <form action="" method="POST" class="row justify-content-center">
            <input name="token" type="hidden" value="<?=$_SESSION['token'];?>">
            
               <li class=" list-unstyled border-bottom pt-2">
               
                <div class="col-12 mb-1">
                   <i class="fa fa-user text-muted"></i>
                   <input  spellcheck="false" name="username" class="border-0 p-2 pl-3" placeholder="Username" style="outline: none;" type="text" required>
                </div>
               </li>
               
               <li class=" list-unstyled mt-3 border-bottom">
                
                <div class="col-12 mb-1">
                   <i class="fa fa-envelope text-muted" aria-hidden="true"></i>
                   <input spellcheck="false" name="mail" class="border-0 p-2 pl-3" placeholder="Email" style="outline: none;" type="email" required>
               
                </div>
               </li>
               
               <li class=" list-unstyled mt-3 border-bottom">
                
                <div class="col-12 mb-1">
                   <i class="fa fa-lock text-muted"></i>
                   <input spellcheck="false" name="pass" class="border-0 p-2 pl-3" placeholder="Password" style="outline: none;" type="password" required>
                </div>
               </li>
               
               <li class="col-10 list-unstyled mt-4 pt-3 pb-3">
                <div class="text-center">
                  <button name="signup-btn"  class="btn btn-dark border-0 pt-2 pb-2 w-100 shadow font-weight-bold text-light">Sign Up</button>
                </div>
               </li>

               <li class="col-10 list-unstyled pt-1">
                     <div class="text-center">
                       <button type="button" onclick="window.location = '<?php echo $floginURL ?>';" style="letter-spacing: 0.2px;" class="btn w-100 pt-2 pb-2 bg-primary font-weight-bold text-light shadow"><img style="width: 24px;border-radius:20px" src="assets/flogo.png" alt=""> Sign In With Facebook</button>
                    </div>
                  </li> 
               
               <li class="list-unstyled mt-3 mb-2">
                 <div class="text-center">
                   <small class="text-muted">Already have an account?</small>
                   <a href="login.php" class="text-success font-weight-bold">Login</a>
                 </div>
               </li>
               
          </form>
        </div>
      </div>
    </div>

<?php include "./assets/script.php";?>
</body>
</html>

