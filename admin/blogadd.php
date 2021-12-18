<?php

 session_start();
 error_reporting(0);
 include "../config/config.php";
 include "./tnc.php";
 include "./auth.php";
 include "./resize-img.php";
 
 if($_SERVER['REQUEST_METHOD'] === 'POST' ){

  if (!hash_equals($_SESSION['token'], $_POST['token'])){
      echo "Invalid CSRF Token !";
      die();
  }else{
      unset($_SESSION['token']);
  }
}

 if(isset($_POST['blogadd'])){

  // For Content
  $title      = $_POST['title'];
  $pone       = $_POST['pone'];
  $ptwo       = $_POST['ptwo'];
  $pthree     = $_POST['pthree'];
  $pfour      = $_POST['pfour'];
  $pfive      = $_POST['pfive'];
  $psix       = $_POST['psix'];
  $pseven     = $_POST['pseven'];
  $link       = $_POST['link'];
  $cat        = $_POST['category'];
  //  Image Path
  $path       = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789qwertyuiopasdfghjklzxcvbnm';
  $path       = str_shuffle($path);
  $path       = substr($path,0,12);
  $imgpath = "../images/$path"; //Create folder path name

  //  Image Name
  $imgone     = $_FILES['imgone']['name'];
  $imgtwo     = $_FILES['imgtwo']['name'];
  $imgthree   = $_FILES['imgthree']['name'];
  $imgfour    = $_FILES['imgfour']['name'];
  $imgfive    = $_FILES['imgfive']['name'];
  $imgsix     = $_FILES['imgsix']['name'];
  
  // Image Type
  $FileTypeone    = $_FILES['imgone']['type'];
  $FileTypetwo    = $_FILES['imgtwo']['type'];
  $FileTypethree  = $_FILES['imgthree']['type'];
  $FileTypefour   = $_FILES['imgfour']['type'];
  $FileTypefive   = $_FILES['imgfive']['type'];
  $FileTypesix    = $_FILES['imgsix']['type'];

  // Image tmp
  $tmpone         = $_FILES['imgone']['tmp_name'];
  $tmptwo         = $_FILES['imgtwo']['tmp_name'];
  $tmpthree       = $_FILES['imgthree']['tmp_name'];
  $tmpfour        = $_FILES['imgfour']['tmp_name'];
  $tmpfive        = $_FILES['imgfive']['tmp_name'];
  $tmpsix         = $_FILES['imgsix']['tmp_name'];

  if(empty($cat)){
     echo "<script>alert('You need to choose category first.');location.href='blogadd.php';</script>";
     exit();
  }else{

     if($imgone != null || $imgtwo != null || $imgthree != null){
  
       if( !file_exists($imgpath) ) {
         if (!mkdir($imgpath, 0777, true)) {
             die('Failed to create folders...');
         }
       }
      
      // Get file from input 1
      if(!empty($imgone)){ 
          if($FileTypeone == "image/jpeg" || $FileTypeone == "image/png" || $FileTypeone == "image/jpg"){
             chmod("$imgpath",0777);
             compressImage($tmpone,75);
             move_uploaded_file($tmpone, "$imgpath/$imgone"); //Add a new photo to  folder      
          }else{
             echo "<script>alert('Error, Image one must be img,jpg & png.');location.href='blogadd.php';</script>";
             exit(); 
          }
      }else{
          echo "<script>alert('Error, There is no image for title');location.href='blogadd.php';</script>";
          exit();
      }
  
      // Get file from input 2
      if(!empty($imgtwo)){ 
          if($FileTypetwo == "image/jpeg" || $FileTypetwo == "image/png" || $FileTypetwo == "image/jpg"){
            compressImage($tmptwo,72);
             move_uploaded_file($tmptwo, "$imgpath/$imgtwo"); //Add a new photo to folder      
          }else{
             echo "<script>alert('Image two must be img,jpg & png.');location.href='blogadd.php';</script>";
             exit();
          }
      }else{
         $imgtwo = "";
      }
  
      // Get file from input 3
      if(!empty($imgthree)){ 
           if($FileTypethree == "image/jpeg" || $FileTypethree == "image/png" || $FileTypethree == "image/jpg"){
             compressImage($tmpthree,72);
             move_uploaded_file($tmpthree, "$imgpath/$imgthree"); //Add a new photo to folder
           }else{ 
               echo "<script>alert('Image three must be img,jpg & png.');location.href='blogadd.php';";
               exit();
           }
  
       }else{
          $imgthree = "";
       }

      // Get file from input 4
      if(!empty($imgfour)){ 
        if($FileTypefour == "image/jpeg" || $FileTypefour == "image/png" || $FileTypefour == "image/jpg"){
          compressImage($tmpfour,72);
          move_uploaded_file($tmpfour, "$imgpath/$imgfour"); //Add a new photo to folder
        }else{ 
            echo "<script>alert('Image four must be img,jpg & png.');location.href='blogadd.php';";
            exit();
        }

      }else{
         $imgfour = "";
      }

      // Get file from input 5
      if(!empty($imgfive)){ 
        if($FileTypefive == "image/jpeg" || $FileTypefive == "image/png" || $FileTypefive == "image/jpg"){
          compressImage($tmpfive,72);
          move_uploaded_file($tmpfive, "$imgpath/$imgfive"); //Add a new photo to folder
        }else{ 
            echo "<script>alert('Image five must be img,jpg & png.');location.href='blogadd.php';";
            exit();
        }

      }else{
         $imgfive = "";
      }

      // Get file from input 6
      if(!empty($imgsix)){ 
        if($FileTypesix == "image/jpeg" || $FileTypesix == "image/png" || $FileTypesix == "image/jpg"){
          compressImage($tmpsix,72);
          move_uploaded_file($tmpsix, "$imgpath/$imgsix"); //Add a new photo to folder
        }else{ 
            echo "<script>alert('Image five must be img,jpg & png.');location.href='blogadd.php';";
            exit();
        }

      }else{
         $imgsix = "";
      }

       
      $stmt    = $pdo->prepare("INSERT INTO blogs(title,pimg,fimg,simg,timg,foimg,fiimg,fcontent,scontent,tcontent,focontent,ficontent,sicontent,secontent,link,category,blog_id,views,created_date) VALUE (:title,:pimg,:fimg,:simg,:timg,:foimg,:fiimg,:fcontent,:scontent,:tcontent,:focontent,:ficontent,:sicontent,:secontent,:link,:category,:blog_id,:views,:created_date)");
      $result  = $stmt->execute(
          array(':title'=>escape($title),':pimg'=>$imgone,':fimg'=>$imgtwo,':simg'=>$imgthree,':timg'=>$imgfour,':foimg'=>$imgfive,':fiimg'=>$imgsix,':fcontent'=>escape($pone),':scontent'=>escape($ptwo),':tcontent'=>escape($pthree),':focontent'=>escape($pfour),':ficontent'=>escape($pfive),':sicontent'=>escape($psix),':secontent'=>escape($pseven),':link'=>$link,':category'=>$cat,':blog_id'=>$path, ':views'=>0,':created_date'=>$ygntime)
      );
      
      if($result){
         header("location:index.php");
      }
      
    }else{
      
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
    <title>Add Post</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <?php include("adminlte/nav.php");?>

    <div class="content-wrapper" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid ">

      
         
        <?php include("./dashboard.php") ?>

            <!-------- Add Product Overlay ------------->
       <div class="row justify-content-center " >  


         <div class="col-12 pb-3">
            <hr>
            <div class="alert alert-success" role="alert">
               <h5 class="alert-heading " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">ရှင်းလင်းချက် !</h5>
               <p id="collapseOne" class="collapse pt-2">Main Photo တစ်ခုနှင့် Title အနည်းဆုံးလိုအပ်သည်။</p>
             </div>
       
             <h4 class="font-weight-bold text-monospace">Add New Blog</h4>
          </div>
                <div class="col-12">
                    <form action="" class="addproduct_style"  enctype="multipart/form-data" method="post">
                     <input name="token" type="hidden" value="<?=$_SESSION['token'];?>">
                      <ul class="list-unstyled mt-1">
                          <li class="pt-2">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-one-preview" src="" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgone" onchange="PreviewImage_one();" type="file" name="imgone" class="" style="opacity:0;max-width:0px;" required>
                          </label>
                        </li>
                        
                        <li class="pt-2 mt-2">
                            <input class="small p-1 pt-2 pb-2 border-0 bg-light w-100" spellcheck="false" placeholder="Post Title" type="text" name="title" id="" cols="10" rows="1" required>
                        </li>


                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 1" name="pone" id="" cols="20" rows="7" required></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-two-preview" src="" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgtwo" onchange="PreviewImage_two();" type="file" name="imgtwo" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>
                        

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 2" name="ptwo" id="" cols="20" rows="7"></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-three-preview" src="" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgthree" onchange="PreviewImage_three();" type="file" name="imgthree" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 3" name="pthree" id="" cols="20" rows="7"></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-four-preview" src="" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgfour" onchange="PreviewImage_four();" type="file" name="imgfour" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 4" name="pfour" id="" cols="20" rows="7"></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-five-preview" src="" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgfive" onchange="PreviewImage_five();" type="file" name="imgfive" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 5" name="pfive" id="" cols="20" rows="7"></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-six-preview" src="" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgsix" onchange="PreviewImage_six();" type="file" name="imgsix" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 6" name="psix" id="" cols="20" rows="7"></textarea>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 7" name="pseven" id="" cols="20" rows="7"></textarea>
                        </li>


                        <div class="row">
                           <li class="pt-2 mt-3 col-6">
                             <input class="small p-2 border-0 bg-light w-100" placeholder="Link" type="text" name="link" id="">
                           </li>
     
                           <li class="pt-2 mt-3 text-left col-6">
                             <select name="category" id="" style="border:none;" class="p-2 w-100">
                                 <option value="">Category</option>
                                  <?php
                                     $result = $pdo->prepare("SELECT * FROM categories");
                                     $cat = $result->execute();
                                     $cat = $result->fetchAll();
                                     foreach($cat as $value) { 
                                   ?>
                                      <option value="<?= $value['id'] ?>"><?= $value['name'] ?> </option>
                                   <?php } ?>
                             </select>
                           </li>
                        </div>

                        <div class="alert alert-success mt-3" role="alert">
                          <p class="mb-0">Add New Post မနှိပ်ခင် Category ကို အရင်စစ်ပါ။</p>
                        </div>
  
                        <li class="col-12 text-center pb-3 " style="top:0px;right:10px;">
                            <button  class="btn w-75 btn-success mt-1 upload font-weight-bold" name="blogadd">Add New Post</button>
                        </li>

                      </ul>
                    </form>
               </div>  
      </div>

          <!-- B-Modal Add to Cart -->
     <div class="modal fade" id="add-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0 text-center d-block">
          <div class="modal-body d-inline-block text-center p-0 shadow border-0 w-50 bg-light" style="border-radius:10px">
             <div class="pt-3">
             <i class="fa fa-2x text-success fa-check-circle" aria-hidden="true"></i>
             </div>
             <h5 class="font-weight-bold text-success pt-1 pb-1">Added </h5>
          </div>
        </div>
      </div>
    </div>

      </div><!-- /.container-fluid -->
    </div>
   
  </div>

   <!-- /.content-wrapper -->
   <footer class="main-footer">
    <strong>Copyright &copy; <?=date("Y") ?> Zakerxa.</strong>
    All rights reserved.
  </footer>

</div>

<script>
   function PreviewImage_one() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgone").files[0]);

    reader.onload = function (oFREvent) {
        document.getElementById("photo-one-preview").src = oFREvent.target.result;
    };
   }
   function PreviewImage_two() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgtwo").files[0]);
    
    reader.onload = function (oFREvent) {
        document.getElementById("photo-two-preview").src = oFREvent.target.result;
    };
   }
   function PreviewImage_three() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgthree").files[0]);
    
    reader.onload = function (oFREvent) {
        document.getElementById("photo-three-preview").src = oFREvent.target.result;
    };
   }
   function PreviewImage_four() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgfour").files[0]);
    
    reader.onload = function (oFREvent) {
        document.getElementById("photo-four-preview").src = oFREvent.target.result;
    };
   }
   function PreviewImage_five() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgfive").files[0]);
    
    reader.onload = function (oFREvent) {
        document.getElementById("photo-five-preview").src = oFREvent.target.result;
    };
   }
   function PreviewImage_six() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("imgsix").files[0]);
    
    reader.onload = function (oFREvent) {
        document.getElementById("photo-six-preview").src = oFREvent.target.result;
    };
   }
</script>
<?php 
  include("../assets/script.php");
  include("adminlte/ltebotscript.php");
?>
</body>
</html>