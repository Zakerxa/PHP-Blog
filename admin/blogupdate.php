<?php

 session_start();
//  error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";
 include "./resize-img.php";

 $blogid = $_GET['id'];
 $edit  = $pdo->prepare("SELECT * FROM blogs WHERE id='$blogid'");
 $row  = $edit->execute();
 $row  = $edit->fetch(PDO::FETCH_ASSOC);

 if(empty($row)){
  header("location:index.php");
  exit();
 }else{
 
  if($_SERVER['REQUEST_METHOD'] === 'POST' ){

    if (!hash_equals($_SESSION['token'], $_POST['token'])){
        echo "Invalid CSRF Token !";
        die();
    }else{
      if(isset($_POST['blogupdate'])){
        $path        = $row['blog_id'];
        $oldimgone   = $row['pimg'];
        $oldimgtwo   = $row['fimg'];
        $oldimgthree = $row['simg'];
        $oldimgfour  = $row['timg'];
        $oldimgfive  = $row['foimg'];
        $oldimgsix   = $row['fiimg'];
       
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
        
        // Image Name
        $imgone     = $_FILES['imgone']['name'];
        $imgtwo     = $_FILES['imgtwo']['name'];
        $imgthree   = $_FILES['imgthree']['name'];
        $imgfour    = $_FILES['imgfour']['name'];
        $imgfive    = $_FILES['imgfive']['name'];
        $imgsix    = $_FILES['imgsix']['name'];
        
        // Image Type
        $FileTypeone    = $_FILES['imgone']['type'];
        $FileTypetwo    = $_FILES['imgtwo']['type'];
        $FileTypethree  = $_FILES['imgthree']['type'];
        $FileTypefour   = $_FILES['imgfour']['type'];
        $FileTypefive   = $_FILES['imgfive']['type'];
        $FileTypesix   = $_FILES['imgsix']['type'];

          // Image tmp
        $tmpone         = $_FILES['imgone']['tmp_name'];
        $tmptwo         = $_FILES['imgtwo']['tmp_name'];
        $tmpthree       = $_FILES['imgthree']['tmp_name'];
        $tmpfour        = $_FILES['imgfour']['tmp_name'];
        $tmpfive        = $_FILES['imgfive']['tmp_name'];
        $tmpsix         = $_FILES['imgsix']['tmp_name'];
              
            
        if(empty($cat)){
           echo "<script>alert('You need to choose category.');location.href='blogupdate.php';</script>";
           exit();
        }else{
          
           // Get file from input 1
            if(!empty($imgone)){ 
                if($FileTypeone == "image/jpeg" || $FileTypeone == "image/png" || $FileTypeone == "image/jpg"){
                  if(empty($oldimgone)){
      
                  }else{
                      unlink("../images/$path/$oldimgone");
                  }
                   compressImage($tmpone,75);
                   move_uploaded_file($tmpone, "../images/$path/$imgone"); //Add a new photo to  folder      
                }else{
                   echo "<script>alert('Error, Image one must be img,jpg & png.');location.href='blogupdate.php';</script>";
                   exit(); 
                }
            }else{
               $imgone = $oldimgone;
            }
        
            // Get file from input 2
            if(!empty($imgtwo)){ 
                if($FileTypetwo == "image/jpeg" || $FileTypetwo == "image/png" || $FileTypetwo == "image/jpg"){
                  if(empty($oldimgtwo)){
      
                  }else{
                      unlink("../images/$path/$oldimgtwo");
                  }
                  compressImage($tmptwo,75);
                   move_uploaded_file($tmptwo, "../images/$path/$imgtwo"); //Add a new photo to folder      
                }else{
                   echo "<script>alert('Image two must be img,jpg & png.');location.href='blogupdate.php';</script>";
                   exit();
                }
            }else{
               $imgtwo = $oldimgtwo;
            }
        
            // Get file from input 3
            if(!empty($imgthree)){ 
                 if($FileTypethree == "image/jpeg" || $FileTypethree == "image/png" || $FileTypethree == "image/jpg"){
                  if(empty($oldimgthree)){
      
                  }else{
                      unlink("../images/$path/$oldimgthree");
                  }
                  compressImage($tmpthree,75);
                   move_uploaded_file($tmpthree, "../images/$path/$imgthree"); //Add a new photo to folder
                 }else{ 
                     echo "<script>alert('Image three must be img,jpg & png.');location.href='blogupdate.php';";
                     exit();
                 }
        
            }else{
               $imgthree = $oldimgthree;
            }
    
                   // Get file from input 4
            if(!empty($imgfour)){ 
              if($FileTypefour == "image/jpeg" || $FileTypefour == "image/png" || $FileTypefour == "image/jpg"){
               if(empty($oldimgfour)){
    
               }else{
                   unlink("../images/$path/$oldimgfour");
               }
               compressImage($tmpfour,75);
                move_uploaded_file($tmpfour, "../images/$path/$imgfour"); //Add a new photo to folder
              }else{ 
                  echo "<script>alert('Image three must be img,jpg & png.');location.href='blogupdate.php';";
                  exit();
              }
     
            }else{
               $imgfour = $oldimgfour;
            }
    
            // Get file from input 5
            if(!empty($imgfive)){ 
               if($FileTypefive == "image/jpeg" || $FileTypefive == "image/png" || $FileTypefive == "image/jpg"){
                if(empty($oldimgfive)){
    
                }else{
                    unlink("../images/$path/$oldimgfive");
                }
                compressImage($tmpfive,75);
                 move_uploaded_file($tmpfive, "../images/$path/$imgfive"); //Add a new photo to folder
               }else{ 
                   echo "<script>alert('Image three must be img,jpg & png.');location.href='blogupdate.php';";
                   exit();
               }
           
            }else{
              $imgfive = $oldimgfive;
            }

              // Get file from input 6
            if(!empty($imgsix)){ 
              if($FileTypesix == "image/jpeg" || $FileTypesix == "image/png" || $FileTypesix == "image/jpg"){
               if(empty($oldimgsix)){
   
               }else{
                   unlink("../images/$path/$oldimgsix");
               }
               compressImage($tmpsix,75);
                move_uploaded_file($tmpsix, "../images/$path/$imgsix"); //Add a new photo to folder
              }else{ 
                  echo "<script>alert('Image three must be img,jpg & png.');location.href='blogupdate.php';";
                  exit();
              }
          
            }else{
              $imgsix = $oldimgsix;
            }
             
             $stmt    = $pdo->prepare("UPDATE blogs SET title=?, pimg=?, fimg=?, simg=?, timg=?, foimg=?, fiimg=?, fcontent=?, scontent=?, tcontent=?, focontent=?, ficontent=?, sicontent=?, secontent=?, link=?, category=? WHERE id=?");
             $result  = $stmt->execute([$title,$imgone,$imgtwo,$imgthree,$imgfour,$imgfive,$imgsix,$pone,$ptwo,$pthree,$pfour,$pfive,$psix,$pseven,$link,$cat,$blogid]);
            
             if($result){
                unset($_SESSION['token']);
                header("location:index.php");
             }    
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
    <?php 
      include("adminlte/ltetopscript.php"); 
      include("../assets/link.php");
    ?>
    <title>Add</title>
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
             <h4 class="font-weight-bold text-monospace">Update Blog</h4>
          </div>
                <div class="col-12">
                    <form action="" class="addproduct_style"  enctype="multipart/form-data" method="post">
                         <input name="token" type="hidden" value="<?=$_SESSION['token'];?>">
                      <ul class="list-unstyled mt-1">
                          <li class="pt-2">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow" id="photo-one-preview" src="../images/<?=$row['blog_id']?>/<?=$row['pimg']?>" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgone" onchange="PreviewImage_one();" type="file" name="imgone" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>
                        
                        <li class="pt-2 mt-2">
                            <textarea class="small p-1 pt-2 pb-2 border-0 bg-light w-100" spellcheck="false" placeholder="T i t l e" name="title" id="" cols="10" rows="1"><?=$row['title']?></textarea>           
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Paragraph 1" name="pone" id="" cols="20" rows="7"><?=$row['fcontent']?></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow"  id="photo-two-preview" src="../images/<?=$row['blog_id']?>/<?=$row['fimg']?>" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgtwo" onchange="PreviewImage_two();" type="file" name="imgtwo" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Paragraph 1" name="ptwo" id="" cols="20" rows="7"><?=$row['scontent']?></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow"  id="photo-three-preview" src="../images/<?=$row['blog_id']?>/<?=$row['simg']?>" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgthree" onchange="PreviewImage_three();" type="file" name="imgthree" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Paragraph 3" name="pthree" id="" cols="20" rows="7"><?=$row['tcontent']?></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow"  id="photo-four-preview" src="../images/<?=$row['blog_id']?>/<?=$row['timg']?>" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgfour" onchange="PreviewImage_four();" type="file" name="imgfour" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 4" name="pfour" id="" cols="20" rows="7"><?=$row['focontent']?></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow"  id="photo-five-preview" src="../images/<?=$row['blog_id']?>/<?=$row['foimg']?>" >
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgfive" onchange="PreviewImage_five();" type="file" name="imgfive" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 5" name="pfive" id="" cols="20" rows="7"><?=$row['ficontent']?></textarea>
                        </li>

                        <li class="pt-2 mt-4">
                          <div class="col-lg-6 col-10 text-left mb-1 p-0">
                            <img class="w-50 shadow"  id="photo-six-preview" src="../images/<?=$row['blog_id']?>/<?=$row['fiimg']?>">
                         </div>
                          <label>
                              <span class="btn btn-primary p-1 d-inline-block position-absolute " style="width:40%">
                                  <i class="fa fa-camera"></i>
                              </span> 
                              <input id="imgsix" onchange="PreviewImage_six();" type="file" name="imgsix" class="" style="opacity:0;max-width:0px;">
                          </label>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 6" name="psix" id="" cols="20" rows="7"><?=$row['sicontent']?></textarea>
                        </li>

                        <li class="pt-2 mt-2">
                           <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="Content 7" name="pseven" id="" cols="20" rows="7"><?=$row['secontent']?></textarea>
                        </li>

                        <div class="row">
                           <li class="pt-2 mt-3 col-6">
                             <input class="small p-2 border-0 bg-light w-100" placeholder="Link" value="<?=$row['link']?>" type="text" name="link" id="">
                           </li>
     
                           <li class="pt-2 mt-3 text-left col-6">
                             <select name="category" id="" style="border:none;" class="p-2 w-100">
                                <?php
                                     $cid = $row['category'];
                                     $cidori = $pdo->prepare("SELECT * FROM categories WHERE id='$cid'");
                                     $original = $cidori->execute();
                                     $original = $cidori->fetch(PDO::FETCH_ASSOC);
                                     echo $original['name'];
                                   ?>
                                 <option value="<?=$row['category']?>"><?=$original['name'];?></option>
                                  <?php
                                     $result = $pdo->prepare("SELECT * FROM categories WHERE id!='$cid'");
                                     $cat = $result->execute();
                                     $cat = $result->fetchAll();
                                     foreach($cat as $value) { 
                                   ?>
                                      <option value="<?= $value['id'] ?>"><?= $value['name'] ?> </option>
                                   <?php } ?>
                             </select>
                           </li>
                        </div>

  
                        <li class="col-12 text-center pb-3 pt-2" style="top:0px;right:10px;">
                            <button  class="btn w-75 btn-success mt-3 upload font-weight-bold" name="blogupdate">Update Blog</button>
                        </li>

                      </ul>
                    </form>
               </div>  
       </div>

      </div>
      <!-- /.container-fluid -->
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