<?php
$catstmt  = $pdo->prepare("SELECT * FROM categories");
$category = $catstmt->execute();
$category = $catstmt->fetchAll();
?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId: '424036802116348',
      xfbml: true,
      version: 'v8.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<nav class="navbar navbar-expand-lg border-bottom position-fixed w-100 fw-bold" style="font-family: sans-serif;background:#fff;z-index:9999">
  <div class="pl-0 mt-2">
    <h5 class="text-dark text-monospace p-1" style="letter-spacing: 5px;">
      <img src="./images/<?= $site['logo'] ?>" class="pr-1" width="50px" alt="logo" style="border-radius: 50px;"><?= $site['sitename'] ?>
    </h5>
  </div>
  <button class="navbar-toggler bg-transparent border-0" type="button" style="outline: none;border:none;" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars text-dark" style="font-size: 30px;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav m-md-auto m-3">
      <li class="nav-item">
        <a class="nav-link text-dark" href="./">Home</a>
      </li>
      <?php foreach ($category as $cat) { ?>
        <li class="nav-item">
          <a class="nav-link text-dark" href="cat.php?id=<?= $cat['id'] ?>"><?= $cat['name'] ?></a>
        </li>
      <?php } ?>
    </ul>

    <ul class="navbar-nav ml-md-auto m-3">

       <li class="nav-item">
          <a class="nav-link text-dark" href="privacy.php"> Privacy</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark" href="disclaimer.php"> Disclaimer</a>
        </li>

      <?php if (isset($_COOKIE['id'])) {  ?>
        <li class="nav-item">
          <a class="nav-link text-dark" href="logout.php"> Logout</a>
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link text-dark" href="login.php"> Login</a>
        </li>
      <?php } ?>
    </ul>

  </div>

</nav>