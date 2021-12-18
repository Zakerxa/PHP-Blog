<?php
setcookie("oauth","", time() - 1);
setcookie("token", "", time() - 1);
header("location:index.php");
exit();