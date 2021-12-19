<div class="footer" style="background-color: #222;">
    <div class="container-fluid">
        <div class="row pt-3 pb-5">
            <div class="col-12 col-lg-4 text-center text-light">
                <img src="images/<?= $site['logo'] ?>" alt="" class="w-25 mb-3" style="border-radius: 100%;">
                <h3><?= $site['sitename'] ?> Media</h3>
                <p class="text-light text-start" style="letter-spacing: 1px;">
                    <?= $site['sitename'] ?> is one of the biggest media site in Myanmar.
                    <?= $site['sitename'] ?> Media Group was established on March, 2019.
                </p>
            </div>
            <div class="col-12 col-lg-4">
                <h4 class="fw-bold pl-3 pb-2 pt-4 text-light">Feature Link</h4>
                <ul class=" p-0" style="list-style: none;">
                    <li class="border-bottom fw-bold pb-1 pt-2"><a style="text-decoration: none;" href="/" class="text-light">Home</a></li>
                    <?php if (isset($_COOKIE['id'])) {  ?>
                        <li class="border-bottom fw-bold pb-1 pt-2">
                            <a style="text-decoration: none;" class="text-light" href="logout.php"> Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="border-bottom fw-bold pb-1 pt-2">
                            <a style="text-decoration: none;" class="text-light" href="login.php"> Login</a>
                        </li>
                    <?php } ?>
                    <li class="border-bottom fw-bold pb-1 pt-2"><a style="text-decoration: none;" href="privacy.php" class="text-light">Privacy</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-4">
                <h4 class="fw-bold pl-3 pb-2 pt-4 text-light">Information </h4>
                <ul class=" p-0" style="list-style: none;">
                    <li class="border-left pl-3 pb-1 pt-2"><i class="fa fa-phone text-warning"></i><a  style="text-decoration: none;" href="tel:+959777637858" class="text-light fw-bold pb-1"> PHONE : +959789770588</a></li>
                    <li class="border-left pl-3 pb-1 pt-2"><i class="fas fa-envelope-open text-warning  "></i> <a  style="text-decoration: none;"href="#" class="text-light fw-bold pb-1"> EMAIL : zakerxa@gmail.com</a></li>
                    <li class="border-left pl-3 pb-1 pt-2"><i class="fas fa-mail-bulk text-warning"></i><a  style="text-decoration: none;"href="#" class="text-light fw-bold pb-1"> POSTAL CODE : 11231</a></li>
                    <li class="border-left pl-3 pb-1 pt-2"><i class="fab fa-facebook text-warning"></i><a  style="text-decoration: none;"href="https://web.facebook.com/YaThaSoneWeb/" class="text-light fw-bold pb-1"> Facebook Page</a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-light text-center">
                <p>Copyright @ <?= date('Y') ?> <?= $site['sitename'] ?> Media.All rights reserved.</p>
            </div>
        </div>
    </div>
</div>