<?php 
 include "./config/config.php";
 include "admin/tnc.php"; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.png">
    <?php include("assets/link.php") ?>
    <title>About</title>
</head>
<body>
<?php include("./nav.php"); ?>
    <div class="container">
        <div class="row pt-5">
            <div class="col-12 pt-5 pb-5">
                <h2 class="pt-4 text-center pb-3">About Us</h2>
                <p class="text-start" style="letter-spacing: 1px;">
                  <?= $site['sitename'] ?> is the leading public service broadcaster in the world and
                  <?= $site['sitename'] ?> is one of the biggest media site in Myanmar.
                  <?= $site['sitename'] ?> Media Group was established on March, 2019.
                </p>
                <hr>
                <h5>We do this across</h5>
                <p>
                We're unbiased and self-sufficient, and every day we produce unique, world-class programming and content that informs, educates, and entertains millions of people in Myanmar and throughout the world.
                </p>
            </div>
        </div>
    </div>

    <?php include("./footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>