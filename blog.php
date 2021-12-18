<?php
include "./config/config.php";
include "admin/tnc.php";

session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
}

$stmt = $pdo->prepare("SELECT * FROM blogs WHERE blog_id=:id");
$row  = $stmt->execute(
    array(':id'=>$id)
);
$row  = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($row)){
  header("location:../index.php");
  exit();
}else{

  $cat  = $row['category'];
  $blogid = $row['id'];
  $_SESSION['post_id'] = $row['id'];
  
  // Relative Blog
  $stmtblog    = $pdo->prepare("SELECT * FROM blogs WHERE category = '$cat' AND blog_id != '$id' ORDER BY id DESC LIMIT 4");
  $relatedblog = $stmtblog->execute();
  $relatedblog = $stmtblog->fetchAll();
  
  
  // Get Blog Category
  $stmtcatblog   = $pdo->prepare("SELECT * FROM categories WHERE id='$cat'");
  $blogcat        = $stmtcatblog->execute();
  $blogcat        = $stmtcatblog->fetch(PDO::FETCH_ASSOC);
  
  $no = $row['views'];
  
  // Adding View Number
  $addview = $pdo->prepare("UPDATE blogs SET views=$no+1 WHERE blog_id='$id'");
  $added  = $addview->execute();

  // Get Post comments by id
  $stmtcm = $pdo->prepare("SELECT * FROM comments WHERE post_id=$blogid ORDER BY id DESC LIMIT 4");
  $stmtcm->execute();
  $cmResult = $stmtcm->fetchAll();
  
  $auResult = [];
  
  // If the post have comments
  if($cmResult){
    // Loop all comments
    foreach($cmResult as $key => $value){
      $author_id = $cmResult[$key]['author_id'];
      $stmtauth = $pdo->prepare("SELECT * FROM users WHERE id=$author_id");
      $stmtauth->execute();
      $auResult[] = $stmtauth->fetchAll();
    }
  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176461624-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-176461624-3');
</script>
    <!-- Localhost base href -->
     <!-- <base href="/" />  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:pages" content="100240385045148" />
    <meta property="og:url"           content="<?=$http.$_SERVER['SERVER_NAME']?>/post/<?=$row['blog_id']?>" />
    <meta property="og:type"          content="website" />
    <meta property="ia:markup_url"    content="<?=$http.$_SERVER['SERVER_NAME']?>/post/<?=$row['blog_id']?>">
    <meta property="fb:app_id"        content="424036802116348"/>
    <meta property="og:title"         content="<?=$row['title']?>"/>
    <meta property="og:description"   content="<?=$row['fcontent']?>" />
    <link rel="canonical" href="<?=$http.$_SERVER['SERVER_NAME']?>/post/<?=$row['blog_id']?>">
    <link rel="alternate" type="application/rss+xml" href="<?=$http.$_SERVER['SERVER_NAME']?>/feed" title="<?=$row['title']?>">
    <link rel="alternate" type="application/rss+xml" href="<?=$http.$_SERVER['SERVER_NAME']?>/rss/<?=$row['blog_id']?>" title="<?=$row['title']?>">
    <meta property="og:image"         content="<?=$http.$_SERVER['SERVER_NAME']?>/images/<?=$row['blog_id'];?>/<?=$row['pimg'];?>" />
    <?php include("assets/link.php") ?> 
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="icon" href="images/<?=$site['logo']?>">
    <title><?=$row['title']?></title>
    <style>
      .row{
        margin:0;
        padding: 0;
       }
    </style>
</head>
<body class="bg-light">

 <!-- Load Facebook SDK for JavaScript -->
 <div id="fb-root"></div>
 <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>


<?php include("./nav.php")?>

    <div class="container pt-5 p-0" id="blog">

          <div class="row m-0 p-0 pt-lg-4 pt-3 justify-content-left">

              <!-- Left News -->
              <div class="col-lg-8 pr-lg-4 col-12 mt-4 p-0">
                    <div class="row p-0 justify-content-center">

                         <!------- Main Title  -->
                         <div class="col-12 text-start">
                             <h5 class="fw-bold" style="line-height:1.3em;"><?=$row['title']?></h5>
                         </div>

                         <!-- Date -->
                         <div class="col-6 pb-2">
                             <small class="fw-bold far fa-clock"> <?=dnc($row['created_date'])?></small>
                         </div>

                          <!-- Views -->
                         <div class="col-6 text-end pb-2">
                            <?php if($row['views'] == 0){ ?>
                       
                            <?php }else{ ?>
                              <small class="fw-bold"><?=nc($row['views'])?> views</small>
                            <?php } ?>
                         </div>

                          <!------ Main Photo --------->
                         <div class="col-12 p-0 mb-2 text-center">
                            <img class="w-100" src="images/<?=$row['blog_id']?>/<?=$row['pimg']?>" alt="">
                         </div>
               
                         <!-- Facebook Share Btn ---->
                         <div class="fb-like pt-3 pb-3 pl-3 w-100 col-10" data-share="true" data-width="320"   data-show-faces="true"></div>

                           <!------- Main Title  -->
                         <div class="col-12 text-start pt-2">
                             <p class="fw-bold mb-0" style="line-height:1.3em;"><?=$row['title']?></p>
                         </div>

                         <!------ Paragraph 1  ---->
                         <div class="col-12 pt-2 pb-2">
                             <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['fcontent']?></p>                 
                         </div>


                         <!------ Photo 2 ---------->
                         <?php if(empty($row['fimg'])){  }else{ ?>
                         
                          <!------ Photo 2 --------->
                          <div class="col-12 p-0 pt-3">
                            <img class="w-100" src="images/<?=$row['blog_id']?>/<?=$row['fimg']?>" alt="">
                          </div>
       
                         <?php  } ?>
           
                         <!------ Paragraph  2 ---------->
                         <div class="col-12 pt-2">
                            <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['scontent']?></p>
                         </div>
                 
                         <!------ Ads Place 1-------->
                         <div class="col-12 p-0 pt-1 pb-1" >
                            <?=$adsense['adsone']?>
                         </div>
                       
                         <!------ Photo 3 ---------->
                         <?php if(empty($row['simg'])){  }else{ ?>
                          
                            <!------ Photo 3 --------->
                            <div class="col-12 p-0 pt-3">
                              <img class="w-100" src="images/<?=$row['blog_id']?>/<?=$row['simg']?>" alt="">
                            </div>
           
                        <?php  } ?>

                      
                        <?php if(empty($row['tcontent'])){  }else{ ?>

                           <!------ Paragraph  3 ---------->
                           <div class="col-12 pt-2">
                              <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['tcontent']?></p>
                           </div>

                         <?php  } ?>

                        <?php if(empty($row['timg'])){  }else{ ?>

                         <!------ Photo 4 --------->
                         <div class="col-12 p-0 pt-3">
                           <img class="w-100" src="images/<?=$row['blog_id']?>/<?=$row['timg']?>" alt="">
                         </div>
       
                        <?php  } ?>

                        <?php if(empty($row['focontent'])){  }else{ ?>

                         <!------ Paragraph  4 ---------->
                         <div class="col-12 pt-2">
                            <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['focontent']?></p>
                         </div>
                         
                         <?php  } ?>
                         
                         <?php if($adsense){ ?>
                              <!------ Ads Place 2 -------->
                              <div class="col-12 p-0 pt-1 pb-1" >
                                 <?=$adsense['adstwo']?>
                              </div>
                              
                          <?php }?>

                       
                        <?php if(empty($row['foimg'])){  }else{ ?>

                         <!------ Photo 5 --------->
                         <div class="col-12 p-0 pt-3">
                           <img class="w-100" src="images/<?=$row['blog_id']?>/<?=$row['foimg']?>" alt="">
                         </div>
       
                        <?php  } ?>

                        <?php if(empty($row['ficontent'])){  }else{ ?>

                          <!------ Paragraph  5 ---------->
                          <div class="col-12 pt-2">
                             <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['ficontent']?></p>
                          </div>
                          
                         

                        <?php  } ?>

                        <?php if(empty($row['sicontent'])){  }else{ ?>

                         <!------ Paragraph  6 ---------->
                         <div class="col-12 pt-2">
                           <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['sicontent']?></p>
                         </div>
                        
                          <?php if($adsense){ ?>
                             <!------ Ads Place 3 -------->
                             <div class="col-12 pt-1 pb-1 p-0" >
                                 <?=$adsense['adsthree']?>
                             </div>
                             
                          <?php }?>
                        
                        <?php  } ?>

                        <?php if(empty($row['fiimg'])){  }else{ ?>
                        
                        
                        <!------ Photo 6 --------->
                        <div class="col-12 p-0 pt-3">
                         <img class="w-100" src="images/<?=$row['blog_id']?>/<?=$row['fiimg']?>" alt="">
                        </div>
                        
                        <?php  } ?>

                        <?php if(empty($row['secontent'])){  }else{ ?>

                        <!------ Paragraph  6 ---------->
                        <div class="col-12 pt-2">
                           <p class="pt-3 text-dark" style="line-height: 1.89em;"><?=$row['secontent']?></p>
                        </div>
                        
                        <?php  } ?>

                        <!------- Link ---------->
                         <div class="col-12 pt-2 pb-3 p-0" >

                            <?php if(empty($row['link'])){
                                 
                             }else { $length = strlen($row['link']); ?>
                                
                               <?php if($length == 28){ $full_length_youtube = $row['link'];   $youtube = substr("$full_length_youtube",17); ?>
           
                                    <!-- Your Youtube embedded video player code -->
                                    <iframe class="responsive w-100" style="height: 250px;" src="https://www.youtube.com/embed/<?=$youtube?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           
                               <?php }else {  $facebook = $row['link']; ?>
                               
                                   <!-- Your Facebook embedded video player code -->
                                   <!--<iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/<?=$facebook?>&show_text=0&width=560&appId=348486042870871&height=313" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>-->

                                    <div class="fb-video" data-href="<?=$facebook?>" data-width="500" data-show-text="false">
                                       <div class="fb-xfbml-parse-ignore">
                                         <blockquote cite="<?=$facebook?>">
                                           <a href="<?=$facebook?>"></a>
                                         </blockquote>
                                       </div>
                                     </div>
                                                     
                                <?php } ?>  
                             
                             <?php } ?>
                                            
                        
                         </div>
                        
                         <!-- Comments Place  -->
                         <div class="col-11 p-0">

                             <h4 class="fw-bold pl-2"> Comments</h4>
                               <hr>
                               <!-- Post New Comments -->
                               <div class="card-footer bg-light p-0 mb-2 pt-2 pb-4" style="border-radius: 10px;"> 
                                   <div class="">
                                  
                                     <div class="col-12">
                                       <b class="p-2 text-center d-block">Add New Comment</b>
                                        <?php if(isset($_COOKIE['id'])){  ?>
                                           <input type="text" v-on:keyup.13="addcomment(msg,'<?=$blogid?>')" v-model="msg" spellcheck="false" name="comment" class="form-control p-3 form-control-sm" placeholder="Press enter to post comment">
                                        <?php }else{ ?>  
                                               
                                               <div class="col-12 pt-3 mt-3 pb-3 " style="background-color: #fff;"  role="alert" >
                                                 <div class="alert-heading ">Comment ရေးရန် 
                                                     <a href="login.php" class="btn btn-dark btn-sm">
                                                        Login 
                                                     </a> ၀င်ပါ
                                                  </div>
                                              
                                               </div>
                                         <?php } ?>
                                     </div>
                                   </div>
                                </div>
                                <!-- Show Comments -->

                             <div class="card-footer card-comments p-0">
                                 <div class="" id="comments">
                             
                                   <?php if($cmResult){ 
                                     foreach($cmResult as $key => $value)  { ?>
                                     <div class="comment-text" style="margin-left: 8px!important;">

                                        <span class="username">
                                           <!-- Show Profile Pic -->
                                            <?php if(!empty($auResult[$key][0]['pic'])){ ?> 
                                                <img class="img-circle img-sm mr-1" src="<?=$auResult[$key][0]['pic']?>" alt="">
                                             <?php }else{ ?>
                                               <img class="img-circle img-sm mr-1" src="./registeruser.png" alt="">
                                             <?php } ?>
                                           <!-- Show Profile Pic -->
                                          <?=$auResult[$key][0]['name']?>
                                          <span class="text-muted float-right"><?=dnc($value['created_date'])?></span>
                                        </span><!-- /.username -->
 
                                        <p class="pl-2 border-bottom pb-2"><?=$value['content'];?></p>
                                        
                                      </div>    
                                   <?php } } ?> 
                                                 
                                 </div>
                                  <!-- Read More Btn -->
                                  <div class="pt-2 pb-2">   
                                    <?php if(count($cmResult) > 4){ ?>
                                       <div style="cursor: pointer;" @click="readmorecm()" class="text-center mb-3 ">Read More Comments . . .</div>
                                     <?php } ?>        
                                  </div>
                             </div>

                         </div>
              
                    </div>
              </div>

               <!-- Right Slide -->
              <div class="col-lg-4 d-none d-lg-block mt-2 position-relative p-0 p-lg-2">

                    
                 <div class=" " style="height: 100vh;">
                   <div class="p-0 position-sticky bg-light shadow" style="top:95px;">
                     <div class="card">
                      <div class="card-body text-center pl-1 pr-2">
                        <h4 class="card-text fw-bold">Popular Posts</h4>
                            <div class="col-12 pb-2 pt-2 p-0">
                                   <?php foreach($maxview as $key => $row){ ?> 
                                     
                                       <div  class=" mb-3"style="cursor:pointer" >
                                       <hr class="m-0 p-0">
                                         <div class="row no-gutters" @click="articles('<?=$row["blog_id"]?>')" >
                                            <!------------- -->
                                               <div class="col-lg-12 text-start">
                                                   <div class="card-body pt-3 pl-3 p-0">
                                                      <h6 class="card-title text-dark text-decoration-none"><?=$row['title']?></h6>   
                                                      
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

                  <div class="" style="height: 150vh;">
                        <div class="position-sticky bg-light " style="top:100px;">
                           <div class="card border-0 shadow">

                              <div class="card-body pt-2 p-0">
                                <h5 class="card-text text-center fw-bold pt-3 pl-3">Relative Posts</h5>
                      
                                   <div class="col-12 pb-2 pt-2 p-0">
                                         <?php foreach($relatedblog as $row){ ?> 
                                             <div  class="mb-3"style="cursor:pointer" >
                                             <hr class="m-0 p-0">
                                               <div class="row no-gutters" @click="articles('<?=$row["blog_id"]?>')" >
                                                  <!------------- -->
                                                     
                                                     <div class="col-md-12 text-start">
                                                         <div class="card-body pt-3 pl-3 p-0">
                                                            <p class="card-title text-dark text-decoration-none"><?=$row['title']?></p>   
                                                            
                                                             <div class="pt-1">
                                                                <p class="card-text mb-0"><small class="text-muted far fa-clock"> <?=dnc($row['created_date'])?> | <b><?=$blogcat['name']?></b> </small></p>
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

                  <div class="d-none d-lg-block" style="height:150vh;">
                        <div class="position-sticky bg-light" style="top:100px;">
                           <!-- Desktop Ads Place -->
                             <?php if($adsense){ ?>
                                <!------ Ads Place 3 -------->
                               <div class="col-12 pt-1 pb-1 p-0">
                                   <?=$adsense['adsfour']?>
                               </div>
                             <?php }?>
                        </div>
                  </div>


            
              </div>

          </div>

          <!-- Small Device relative new -->
          <div class="row d-lg-none pb-5 justify-content-left">
               
               <div class="col-12 pb-4 pt-5 pl-4">
                 <h4 class="card-text fw-bold">Popular Posts</h4>
               </div>

                  <div class="col-12 pb-2 pt-2">
                
                     <?php foreach($maxview as $key => $row){ ?> 
                         <div class="card shadow mb-3">
                             <div class="row no-gutters" @click="articles('<?=$row["blog_id"]?>')">
                                <!--------------- -->
                                <div class="col-lg-4">
                                  <img src="./images/<?=$row['blog_id']?>/<?=$row['pimg']?>" class="card-img" alt="...">
                                </div>
                                <!------------- -->
                                <div class="col-lg-8">
                                    <div class="card-body pb-2">
                                       <h6 class="card-title pb-2 text-dark fw-bold" style="line-height: 1.8em;"><?=$row['title']?></h6>
                                       <div class="row text-muted w-100" style="bottom: 6px;">
                                          <div class="col-6">
                                             <p class="card-text mb-0"><small class="text-muted fa fa-eye"> <?=nc($row['views'])?></small></p>
                                          </div>
                                          <div class="col-6 text-end pr-4">
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
               

              <div class="col-12 pb-4 pt-5 pl-4">
                  <h5 class="text-uppercase fw-bold" style="letter-spacing: 1px;">Related Posts</h5>
                  <hr class="bg-dark">
              </div>

              <div class="col-12 pb-2 pt-2">
                   <?php foreach($relatedblog as $row){ ?> 
                       <div  class="card shadow mb-3" >
                         <div class="row no-gutters" @click="articles('<?=$row["blog_id"]?>')">
                            <!--------------- -->
                            <div class="col-lg-4">
                              <img src="./images/<?=$row['blog_id']?>/<?=$row['pimg']?>" class="card-img" alt="...">
                            </div>
                            <!------------- -->
                            <div class="col-lg-8">
                              <div class="card-body pb-2">
                                 <h5 class="card-title pb-2 text-dark fw-bold" style="line-height: 1.8em;"><?=$row['title']?></h5>
                                 <div class="row text-muted w-100" style="bottom: 6px;">
                                    <div class="col-6">
                                       <p class="card-text mb-0"><small class="text-muted fa fa-eye"> <?=nc($row['views'])?></small></p>
                                    </div>
                                    <div class="col-6 text-end pr-4">
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

          </div>
        
    </div>
  
    
  
    <div class="footer" style="background-color: #222;">
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
    el : "#blog",
    data : {
     msg : "",
     cmcount : 4
    },
    methods:{
      articles(b){
        location.href = `blog.php?id=${b}`
      },
      addcomment(msg,id){
         if(!(this.msg == "")){
          $.ajax({
          type: 'post',
          url: 'addcomment.php',
          data: {
              msg : msg,
              id  : id
          },
          error:(err)=>{
             console.log(err);
          },
          success: function (response) {
            console.log("Success ",response)
            $('#comments').load("refresh/addcm.php");
          }
        });

        this.msg = "";
         }else{
           alert("Write something about . . .")
         }
      },
      readmorecm(){
        this.cmcount = this.cmcount + 3;
        $('#comments').load("refresh/readmorecm.php",{
           cmnewcount : this.cmcount
        });
       
      }

    }
  })
</script>
</body>
</html>