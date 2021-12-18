<?php
 session_start();
 // Turn off error reporting
 error_reporting(0);
 require "../config/config.php";
 require "./tnc.php";
 require "./auth.php";


 if(!empty($_GET['pageno'])){
  $pageno = $_GET['pageno'];

}else{  
  $pageno = 1;
}
$noOffrecs = 5;
$offset   = ($pageno - 1) * $noOffrecs;


if(!isset($_POST['search-btn'])){
  $stmt = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC");
  $stmt->execute();
  $rawResult = $stmt->fetchAll();
  $total_page = ceil(count($rawResult) / $noOffrecs);

  $stmt = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT $offset,$noOffrecs");
  $stmt->execute();
  $result = $stmt->fetchAll();
}else{
  $searchkey = $_POST['search'];
  $stmt = $pdo->prepare("SELECT * FROM blogs WHERE title LIKE '%$searchkey%' ORDER BY id DESC");
  $stmt->execute();
  $rawResult = $stmt->fetchAll();
  $total_page = ceil(count($rawResult) / $noOffrecs);

  $stmt = $pdo->prepare("SELECT * FROM blogs WHERE title LIKE '%$searchkey%' ORDER BY id DESC LIMIT $offset,$noOffrecs");
  $stmt->execute();
  $result = $stmt->fetchAll();
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
 
   <div class="content-wrapper" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <?php include("./dashboard.php") ?>

        <div class="row justify-content-center" id="admin" >   
           <div class="col-12 pb-3">

             <div class="card">

                <?php if(empty($result)){ ?>
                         <div class="text-center pt-5 pb-4">
                            <h3 class="text-center text-monospace">There is no Post right now.</h3>
                         </div>
                  <?php }else{ ?>
                   
                 <div class="card-header pt-4">
                   <h3 class="card-title font-weight-bold text-monospace">Total Posts</h3>
                
                   <div class="card-tools">
                     <ul class="pagination pagination-sm float-right">
                     <li class="page-item"><a class="page-link" href="?pageno=1">&laquo;</a></li>
                     <li class="page-item <?php  if($pageno <= 1){ echo 'disabled';} ?>"><a class="page-link" href="<?php if($pageno <= 1){ echo '#';}else { echo "?pageno=".($pageno-1);} ?>">Pre</a></li>
                     <li class="page-item"><a class="page-link" href="#"><?=$pageno?></a></li>
                     <li class="page-item <?php if($pageno >= $total_page){ echo 'disabled';} ?>"><a class="page-link" href="<?php if($pageno >= $total_page){ echo '#';}else { echo "?pageno=".($pageno+1);} ?>">Next</a></li>
                     <li class="page-item"><a class="page-link" href="?pageno=<?=$total_page?>">&raquo;</a></li>
                     </ul>
                   </div>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                     
                   <table class="table">
                     <thead>
                       <tr>
                        <th style="width: 10px">*</th>
                        <th>Title</th>
                        <th style="width: 20%;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php if($result){
                         $i = 1;
                          foreach($result as $value){  ?>
                            <tr>         
                               <td><?=$i?></td>
                               <td><?=substr($value['title'],0,250)?></td>
                               
                               <td>
                                 <div class="btn-group row p-0 justify-content-center">
                                   <div title="Edit" class="col-8  col-md-4 mt-1 text-center">
                                     <a href="blogupdate.php?id=<?=$value['id']?>" class="fas fa-wrench btn btn-warning" ></a> 
                                   </div>
                                   <div title="Delete" class="col-8 col-md-4 mt-1 text-center">
                                     <a href="delete/delete-blog.php?id=<?=$value['id']?>" onclick="return confirm('Are you sure you want to delete this blog?');" class="fa fa-trash btn btn-danger" ></a>
                                   </div>
                                   <div title="Copy Link" class="col-8 col-md-4 mt-1 text-center">
                                     <button class="btn btn-primary far fa-copy" @click="copy_to_clipboard(<?=$value['id']?>)">
                                     <input id="<?=$value['id']?>" style="width:10px;left:0;z-index:-1;" spellcheck="false" class="position-absolute" type="text" value="<?=$http.$_SERVER['SERVER_NAME']?>/post/<?=$value['blog_id']?>">
                                     </button>
                                     
                                   </div>
                                 </div>
                               </td>
                             </tr>
                        <?php $i++;
                         }  
                       } ?>
                     </tbody>
                   </table>
                 </div>
                
                <?php } ?>
                 <!-- /.card-body -->
              </div>
            </div>
                
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

<script>

     new Vue({
         el : "#admin",
         data : {
           msg : "Hello",
           traffic : ""
         },
         methods:{
            copy_to_clipboard(id) {
                 var copyText = document.getElementById(id);
                 copyText.select();
                 copyText.setSelectionRange(0, 99999);
                 document.execCommand("copy");
                 console.log(id)
            }
         }
     })
</script>

</body>
</html>