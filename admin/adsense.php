<?php
session_start();
// Turn off error reporting
error_reporting(0);
require "../config/config.php";
require "./tnc.php";
require "./auth.php";

$stmtads  = $pdo->prepare("SELECT * FROM ads LIMIT 1");
$adsense = $stmtads->execute();
$adsense = $stmtads->fetch(PDO::FETCH_ASSOC);

$adsone   = $_POST['adsone'];
$adstwo   = $_POST['adstwo'];
$adsthree = $_POST['adsthree'];
$adsfour  = $_POST['adsfour'];
$adsfive  = $_POST['adsfive'];
$adssix   = $_POST['adssix'];
$adstxt   = $_POST['adstxt'];

if(isset($_POST['add-ads'])){

    $addads    = $pdo->prepare("INSERT INTO ads(adsone,adstwo,adsthree,adsfour,adsfive,adssix,ads_text) VALUE (:adsone,:adstwo,:adsthree,:adsfour,:adsfive,:adssix,:adstxt)");
    $doneads  = $addads->execute(
        array(':adsone'=>$adsone,':adstwo'=>$adstwo,':adsthree'=>$adsthree,':adsfour'=>$adsfour,':adsfive'=>$adsfive,':adssix'=>$adssix,':adstxt'=>$adstxt)
    );
    
    if($doneads){
       $ads  = fopen("../ads.txt",'w') or die("Unable to open file!");
       fwrite($ads,$adstxt);
       fclose($ads);
       chmod("$ads",0777);
       header("location:adsense.php");
    }

   
}

if(isset($_POST['update-ads'])){

    $updateads = $pdo->prepare("UPDATE ads SET adsone='$adsone', adstwo='$adstwo', adsthree='$adsthree', adsfour='$adsfour', adsfive='$adsfive', adssix='$adssix', ads_text='$adstxt'");
    $updoneads   = $updateads->execute();
    
    if($updoneads){
      $ads  = fopen("../ads.txt",'w') or die("Unable to open file!");
      fwrite($ads,$adstxt);
      fclose($ads);
      chmod("$ads",0777);
      header("location:adsense.php");

    }

    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
include "adminlte/ltetopscript.php";
include "../assets/link.php";
?>
    <title>Admin Panel</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

   <?php include "adminlte/nav.php";?>

   <div class="content-wrapper" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <?php include "./dashboard.php"?>

        <div class="row">
            <div class="col-12">
                    <form action="" class="addproduct_style"  enctype="multipart/form-data" method="post">
                      <ul class="list-unstyled mt-1">

                        <?php if(!empty($adsense)){ ?>

                            <h5>Ads.txt</h5>

                            <li class="pt-2 mt-2">
                                <textarea class="small p-1 pt-2 pb-2 border-0 bg-light w-100" spellcheck="false" placeholder="google.com, pub-xxxxxxxxxxx, DIRECT, xxxxxxxxxxx" name="adstxt" id="" cols="10" rows="1"><?=$adsense['ads_text']?></textarea>
                            </li>


                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 1 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsone" id="" cols="20" rows="7"><?=$adsense['adsone']?></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 2 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adstwo" id="" cols="20" rows="7"><?=$adsense['adstwo']?></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 3 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsthree" id="" cols="20" rows="7"><?=$adsense['adsthree']?></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 4 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsfour" id="" cols="20" rows="7"><?=$adsense['adsfour']?></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 5 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsfive" id="" cols="20" rows="7"><?=$adsense['adsfive']?></textarea>
                            </li>
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 6 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adssix" id="" cols="20" rows="7"><?=$adsense['adssix']?></textarea>
                            </li>
                            

                            <li class="col-12 text-center pb-3 pt-2" style="top:0px;right:10px;">
                              <button  class="btn w-75 btn-success mt-3 upload font-weight-bold" name="update-ads">Update Ads Unit</button>
                           </li>
                        <?php }else{  ?>

                           <h5>Ads.txt</h5>
                            <li class="pt-2 mt-2">
                                <textarea class="small p-1 pt-2 pb-2 border-0 bg-light w-100" spellcheck="false" placeholder="google.com, pub-xxxxxxxxxxx, DIRECT, xxxxxxxxxxx" name="adstxt" id="" cols="10" rows="1"></textarea>
                            </li>


                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 1 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsone" id="" cols="20" rows="7"></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 2 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adstwo" id="" cols="20" rows="7"></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 3 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsthree" id="" cols="20" rows="7"></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 4 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsfour" id="" cols="20" rows="7"></textarea>
                            </li>
    
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 5 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adsfive" id="" cols="20" rows="7"></textarea>
                            </li>
    
                            <li class="pt-2 mt-2">
                               <h5>Ad Unit 6 <span class="text-danger" title="Insert google ad unit" style="cursor: pointer;">*</span></h5>
                               <textarea class="small p-1 border-0 bg-light w-100" spellcheck="false" placeholder="<script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script> . . ." name="adssix" id="" cols="20" rows="7"></textarea>
                            </li>
                            
                            <li class="col-12 text-center pb-3 pt-2" style="top:0px;right:10px;">
                              <button  class="btn w-75 btn-success mt-3 upload font-weight-bold" name="add-ads">Add Ads Unit</button>
                           </li>

                        <?php } ?>

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
include "../assets/script.php";
include "adminlte/ltebotscript.php";
?>


</body>
</html>