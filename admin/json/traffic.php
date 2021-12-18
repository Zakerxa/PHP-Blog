<?php 
  include("../../config/config.php");
  include("../tnc.php");
  error_reporting(0);
  $CAT = $pdo->prepare("SELECT views FROM blogs ORDER BY views");
  $NC  = $CAT->execute();
  $NC  = $CAT->fetchAll();

  $views = "";

    if(empty($NC)){ 
    
    }else{ 

      foreach($NC as $key => $no){ 
        $views += (int)$no['views'];
      }

      $trafficjson = array('traffic' => nc($views));
      $trafficjson = json_encode($trafficjson,JSON_UNESCAPED_SLASHES);

      echo $trafficjson;
    
    } 