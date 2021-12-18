
 <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Dashboard</h1>
    </div>
  </div><!-- /.row -->


<div class="row mt-3" id="dashboard">

<!-- ./col -->
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-warning">
  <div class="inner">
     <h3>{{traffic}}</h3>
    <p>Total Traffic</p>
  </div>
  <div class="icon">
    <i class="ion ion-stats-bars"></i>
  </div>
  <div class="text-center pb-2">
    View info <i class="fas fa-arrow-circle-right"></i>
   </div>
  <a href="traffic.php" title="Check all Category" class="small-box-footer bg-transparent position-absolute w-100" style="bottom: 0;height:100%;z-index:0;"></a>
</div>
</div>

<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-primary">
  <div class="inner">
  <?php 
    $BLOG = $pdo->prepare("SELECT count(*) as total FROM blogs");
    $NB = $BLOG->execute();
    $NB = $BLOG->fetch(PDO::ATTR_AUTOCOMMIT)
  ?>
    <h3><?=$NB['total']?></h3>

    <p>Total Post</p>
  </div>
  <div class="icon">
    <i class="fas fa-sitemap"></i>
  </div>
  <div class="text-center pb-2">
    View info <i class="fas fa-arrow-circle-right"></i>
   </div>
  <a href="./" title="Check all Post" class="small-box-footer bg-transparent position-absolute w-100" style="bottom: 0;height:100%;z-index:0;"></a>
</div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-success">
  <div class="inner">
    <h3>Add +</h3>

    <p>Add New Post</p>
  </div>
  <div class="icon">
    <i class="fas fa-plus-circle"></i>
  </div>
  <div class="text-center pb-2">
    View info <i class="fas fa-arrow-circle-right"></i>
   </div>
  <a href="blogadd.php" title="Add New Post" class="small-box-footer bg-transparent position-absolute w-100" style="bottom: 0;height:100%;z-index:0;"></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-danger">
  <div class="inner">
    <h3>Cat +</h3>

    <p>Add New Category</p>
  </div>
  <div class="icon">
    <i class="fas fa-plus-circle"></i>
  </div>
  <div class="text-center pb-2">
    View info <i class="fas fa-arrow-circle-right"></i>
   </div>
  <a href="catadd.php" title="Add New Category" class="small-box-footer bg-transparent position-absolute w-100" style="bottom: 0;height:100%;z-index:0;"></a>
</div>
</div>
<!-- ./col -->
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
     new Vue({
         el : "#dashboard",
         data : {
           msg : "Hello",
           traffic : ". . ."
         },
         methods:{
            getData() {
             
              $.ajax({
                type: 'get',
                dataType: "json",
                url: 'json/traffic.php',
                success: function (res) {
                 
                }
              }).then(res => {
                this.traffic = res.traffic;
              });

            }
         },
         mounted() {
         
          setInterval(() => {
            this.getData(); 
          }, 2000);
          
         },
     })
</script>