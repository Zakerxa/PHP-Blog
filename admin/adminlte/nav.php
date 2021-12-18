  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <?php
      $link = $_SERVER['PHP_SELF'];
      $link_array = explode('/',$link);
      $page = end($link_array);
    ?>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="post" action="<?php echo $page == 'index.php' ? 'index.php':'index.php'; ?>">
    <input name="_token" type="hidden" value="<?php echo $_SESSION['_token']; ?>">

      <div class="input-group input-group-sm">
        <input name="search" class="form-control form-control-navbar" type="search" placeholder="Search by post title" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" name="search-btn">
           
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../photo/preview.gif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="traffic.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Traffic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cat-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>   
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open"> 
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Website
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav-treeview">
               <li class="nav-item">
                 <a href="siteview.php" class="nav-link">
                   <i class="fas fa-eye"></i>
                   <p>View </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="siteupdate.php" class="nav-link">
                   <i class="fas fa-wrench"></i>
                   <p>Update </p>
                 </a>
               </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open"> 
            <a href="adsense.php" class="nav-link">
               <i class="nav-icon fa fa-audio-description"></i>
               <p>Adsense </p>
               <i class="right fas fa-angle-left"></i>
             </a>
            <ul class="nav-treeview">
               <li class="nav-item">
                 <a href="adsense.php" class="nav-link">
                    <i class="fa fa-code"></i>
                    <p>Ad Units </p>
                  </a>
               </li>
            </ul>
          </li>

         

          <li class="nav-header" style="letter-spacing: 1PX;">Account</li>
          <li class="nav-item">
            <a href="profileview.php" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>Profile</p>
            </a>
          </li>
         
        
          <li class="nav-header">LOGOUT</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p class="font-weight-bold">LogOut</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>