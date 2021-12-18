<?php
 include "./config/config.php";
 include "admin/tnc.php";
 
 $stmt   = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT 20");
 $blog   = $stmt->execute();
 $blog   = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- comment in localhost base href -->
    <!-- <base href="/" />   -->
    <meta charset="UTF-8"> 
    <meta name="facebook-domain-verification" content="n2fxoikrkapwos4njdejkr2qf1hofb" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:pages" content="100240385045148" />
    <meta property="og:url"           content="<?=$http.$_SERVER['SERVER_NAME']?>" />
    <meta property="og:type"          content="article" />
    <meta property="ia:markup_url"    content="<?=$http.$_SERVER['SERVER_NAME']?>">
    <meta property="fb:app_id"        content="424036802116348"/>
    <meta property="og:title"         content="<?=$site['sitename']?>"/>
    <meta property="og:description"   content="<?=$site['sitename']?> မှ နည်းပညာများ၊ သတင်းများကို နေ့စဉ်နှင့်အမျှ တင်ပေးနေပါသောကြောင့် Page လေးကို Like & Follow လုပ်ထားခြင်းဖြင့် မိမိတို့စိတ်၀င်စားရာ ၀ါသနာပါရာများကို လေ့လာကြည့်ရှူနိုင်ပါပြီ။" />
    <meta property="og:image"         content="<?=$http.$_SERVER['SERVER_NAME']?>/images/<?=$site['logo']?>" />
    <meta property="og:image:type"    content="image/jpeg">
    <meta property="og:image:type"    content="image/png">
    <meta property="og:image:type"    content="image/gif">
    <meta property="og:image:type"    content="image/jpg">
    <link rel="canonical" href="<?=$http.$_SERVER['SERVER_NAME']?>">
    <link rel="alternate" type="application/rss+xml" href="<?=$http.$_SERVER['SERVER_NAME']?>/feed" title="YaThaSone Media">
    <!-- CSS only -->
    <?php include("assets/link.php") ?> 
    <link rel="icon" href="images/<?=$site['logo']?>">
    <title><?=$site['sitename']?></title>
</head>
<body class="bg-light">
   
 <?php include("./nav.php")?>

 <div class="container pt-5" id="yatha">

     <div class="row pt-4 justify-content-center">
      
       <div  class="col-lg-8 col-12 mt-4">

          <?php foreach($blog as $key => $row){ ?> 

            <div  class="card shadow mb-3" style="cursor:pointer">
                <div class="row no-gutters" @click="articles('<?=$row["blog_id"]?>')">
                   <!--------------- -->
                   <div class="col-md-4">
                     <img src="images/<?=$row['blog_id']?>/<?=$row['pimg']?>" class="card-img" alt="...">
                   </div>
                   <!------------- -->
                   <div class="col-md-8">
                       <div class="card-body">
                         <h6 class="card-title pb-2 text-dark text-decoration-none" style="line-height: 1.8em;"><?=$row['title']?></h6>
                          <div class="row text-muted position-absolute w-100" style="bottom: 6px;">
                             <div class="col-6 col-md-4">
                                <p class="card-text mb-0"><small class="text-muted fa fa-eye"> <?=nc($row['views'])?></small></p>
                             </div>
                             <div class="col-6 col-md-4 text-right">
                                <p class="card-text mb-0"><small class="text-muted far fa-clock"> <?=dnc($row['created_date'])?></small></p>
                             </div>
                          </div>
                      </div> 
                   </div>
                    <!-------------- -->
                </div>
            </div>

          <?php } ?>
       </div>
       
        <div class="col-lg-4 d-none d-lg-block mt-3 position-relative p-0 p-lg-2">

            <div class=" " style="height: 100vh;">
                <div class="p-0 position-sticky bg-light shadow" style="top:95px;">
                   <div class="card">
                      <!-- <img src="./photo/msp.jpg" class="card-img-top" alt="..."> -->
                      <div class="card-body text-center pl-1 pr-2">
                        <h4 class="card-text font-weight-bold">Popular Posts</h4>
                            <div class="col-12 pb-2 pt-2 p-0">
                                   <?php foreach($maxview as $key => $row){ ?> 
                                     
                                       <div  class="card border-0  mb-3"style="cursor:pointer" >
                                       <hr class="m-0 p-0">
                                         <div class="row no-gutters" @click="articles('<?=$row["blog_id"]?>')" >
                                            <!------------- -->
                                               <div class="col-lg-12 text-start">
                                                   <div class="card-body pt-3 pl-3 p-0">
                                                      <h6 class="card-title text-dark font-weight-bold "><?=$row['title']?></h6>   
                                                      
                                                       <div class="pt-1">
                                                          <p class="card-text mb-0">
                                                          <small class="text-muted far fa-clock"> <?=dnc($row['created_date'])?> |
                                                             <b>
                                                                <?= $mostcat[$key][0]['name'] ?>  
                                                            </b> 
                                                          </small></p>
                                                       </div>
                                                  </div>
                                               </div>
                                         <!-------------- -->
                                         </div>
                                    
                                    </div>
                                   <?php } ?>
                               </div>
                      </div>
                    </div>
                </div>
             </div>
  
             <div class="mt-5 d-none d-lg-block" style="height:50vh">
                <div class="p-0 position-sticky bg-light" style="top:95px;">
                   <!-- Desktop Ads Place -->
                   <?php if($adsense){ ?>
                       <!------ Ads Place 3 -------->
                      <div class="col-12 pt-1 pb-1 p-0">
                          <?=$adsense['adssix']?>
                      </div>
                    <?php }?>
                </div>
             </div>
           
          
        </div>
      
     </div>

 </div>


    <div class="footer mt-4" style="background-color: #222;">
      <div class="container">
        <div class="row pt-4 pb-2">
          
             <div class="col-12 text-light">
                  <ul class="text-light text-center pt-3 mb-0 list-unstyled">
                     <li class="pt-3 pb-3"><h6>Copyright @<?=date('Y')?> <?=$site['sitename']?></h6></li>
                     <li class=""> <p>Powered by Zakerxa</p></li>
                   </ul>
              </div>
                 
        </div>
      </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>
  new Vue({
    el : "#yatha",
    methods:{
      articles(b){
        location.href = `blog.php?id=${b}`
      }
    }
  })
</script>
</body>
</html>