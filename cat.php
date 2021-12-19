<?php 

include "./config/config.php";
include "admin/tnc.php";

 //  Site Logo
 $sitestmt = $pdo->prepare("SELECT * FROM site");
 $site = $sitestmt->execute();
 $site = $sitestmt->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];

    $stmt   = $pdo->prepare("SELECT * FROM blogs WHERE category=:id ORDER BY id DESC");
    $blog   = $stmt->execute(
        array(':id'=>$cat_id)
    );
    $blog   = $stmt->fetchAll();
}

if(empty($blog)){
    header("location:index.php");
    exit();
}else{

    $stmtcat = $pdo->prepare("SELECT * FROM categories WHERE id=$cat_id");
    $nowcat  = $stmtcat->execute();
    $nowcat  = $stmtcat->fetch(PDO::FETCH_ASSOC);

     //  Trending New
    $stmtmaxview  = $pdo->prepare("SELECT * FROM blogs ORDER BY views DESC LIMIT 4");
    $maxview    = $stmtmaxview->execute();
    $maxview    = $stmtmaxview->fetchAll();
   
     $mostcat = [];
   
    foreach($maxview as $key => $value){
     $blog_id = $maxview[$key]['category'];
     $stmtmostviewcat = $pdo->prepare("SELECT * FROM categories WHERE id=$blog_id");
     $stmtmostviewcat->execute();
     $mostcat[] = $stmtmostviewcat->fetchAll();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <base href="/" /> -->
    <meta charset="UTF-8">
    <meta property="fb:pages" content="100240385045148" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("assets/link.php") ?> 
    <link rel="icon" href="images/<?=$site['logo']?>">
    <title><?=$nowcat['name']?></title>
</head>
<body>
    

 <?php include("./nav.php")?>


  <div class="container pt-5" id="cat">

    <div class="row pt-4 justify-content-center">
      
      <div id="yatha" class="col-lg-8 col-12 mt-4">

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
                          <h6 class="card-title text-dark text-decoration-none" style="line-height: 1.8em;"><?=$row['title']?></h6>
                          <div class="row text-muted position-absolute w-100" style="bottom: 6px;">
                             <div class="col-6">
                                <p class="card-text mb-0"><small class="text-muted fa fa-eye"> <?=nc($row['views'])?></small></p>
                             </div>
                             <div class="col-6 text-right">
                                <p class="card-text mb-0"><small class="text-muted fas fa-calendar-day"> <?=dnc($row['created_date'])?></small></p>
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
          <div class=" " style="height: 200vh;">
                <div class="p-0 position-sticky bg-light shadow" style="top:20px;">
                   <div class="card">
                      <!-- <img src="./photo/msp.jpg" class="card-img-top" alt="..."> -->
                      <div class="card-body text-center">
                        <h4 class="card-text font-weight-bold">Popular News</h4>
                            <div class="col-12 pb-2 pt-2 p-0 text-start">
                                   <?php foreach($maxview as $key => $row){ ?> 
                                     
                                       <div  class="card border-0  mb-3"style="cursor:pointer" >
                                       <hr class="m-0 p-0">
                                         <div class="row no-gutters" @click="mostview('<?=$row["blog_id"]?>')" >
                                            <!------------- -->
                                               <div class="col-md-12 text-left">
                                                   <div class="card-body pt-3 pl-3 p-0">
                                                      <h6 class="card-title text-left text-dark text-decoration-none  font-weight-bold "><?=$row['title']?></h6>   
                                                      
                                                       <div class="pt-1">
                                                          <p class="card-text mb-0">
                                                          <small class="text-muted"><?=dnc($row['created_date'])?> |
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
       </div>
     
    </div>

  </div>
    
    
  <?php include("./footer.php");?>


<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


<script>
  new Vue({
    el : "#cat",
    data : {
     
    },
    methods:{
      articles(b){
        location.href = `blog.php?id=${b}`
      },
      mostview(b){
        location.href = `blog.php?id=${b}`
      }
    }
  })
</script>
</body>
</html>