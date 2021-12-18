<?php 

  // Compress image & Solve Rotate
function compressImage($source, $quality) {
     
    $info = getimagesize($source);
 
    if ($info['mime'] == 'image/jpeg'){
      $image = imagecreatefromjpeg($source);
    } 
     
    elseif ($info['mime'] == 'image/gif'){
      $image = imagecreatefromgif($source);
    }
      
    elseif ($info['mime'] == 'image/png'){
      $image = imagecreatefrompng($source);
    }
    

    $exif = exif_read_data($source);
    if (!empty($exif['Orientation'])) {
        $imageResource = imagecreatefromjpeg($source); // provided that the image is jpeg. Use relevant function otherwise
        switch ($exif['Orientation']) {
           case 3:
           $image = imagerotate($imageResource, 180, 0);
           break;
           case 6:
           $image = imagerotate($imageResource, -90, 0);
           break;
           case 8:
           $image = imagerotate($imageResource, 90, 0);
           break;
           default: $image = $imageResource;
        } 
    }

    imagejpeg($image, $source, $quality);


}   


?>