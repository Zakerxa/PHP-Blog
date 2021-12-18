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
$noOffrecs = 10;
$offset   = ($pageno - 1) * $noOffrecs;


  $stmt = $pdo->prepare("SELECT * FROM blogs WHERE title LIKE '%$searchkey%' ORDER BY views DESC");
  $stmt->execute();
  $rawResult = $stmt->fetchAll();
  $total_page = ceil(count($rawResult) / $noOffrecs);

  $stmt = $pdo->prepare("SELECT * FROM blogs WHERE title LIKE '%$searchkey%' ORDER BY views DESC LIMIT $offset,$noOffrecs");
  $stmt->execute();
  $result = $stmt->fetchAll();

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
 
   <div class="content-wrapper" id="admin" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom, rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%);background-blend-mode: screen, overlay;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <?php include("./dashboard.php") ?>

         <div class="row">
           <div class="col-md-12">
            <div class="card">

             <?php if(empty($result)){ ?>
                      <div class="text-center pt-5 pb-4">
                         <h3 class="text-center text-monospace">There is no View right now.</h3>
                      </div>
               <?php }else{ ?>
                
              <div class="card-header pt-4">
                <h3 class="card-title font-weight-bold text-monospace">Total Web View</h3>

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
                      <th>Posts</th>
                      <th style="width: 15%;">View</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if($result){
                  $i = 1;
                   foreach($result as $value){  ?>
                    <tr> 
                      <td><?=$i?></td> 
                      <td><?=substr($value['title'],0,290)?></td>
                      <td><span class="badge bg-success" style="width:100%;"><?=nc($value['views'])?></span></td>
                    </tr>
                    <?php $i++; } 
                   } ?>
                  </tbody>
                </table>
              </div>

             <?php } ?>
              <!-- /.card-body -->
           </div>
            <!-- /.card -->

            
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


</body>
</html>