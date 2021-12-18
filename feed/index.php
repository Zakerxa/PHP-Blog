<?php

/*Generate GUID for instant article
*
* @return string 	
*/
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

include "../config/config.php";
$site     = $pdo->prepare("SELECT * FROM site LIMIT 1");
$siteinfo = $site->execute();
$siteinfo = $site->fetch(PDO::FETCH_ASSOC);

$sitename = $siteinfo['sitename'];
$sitelogo = $siteinfo['logo'];

$news     = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT 50");
$query    = $news->execute();
$query    = $news->fetchAll();


header("Content-Type: text/rss;charset=iso-8859-1");
// header("Content-Type: application/rss+xml; charset=ISO-8859-1");

$base_url = "https://zakerxa.com";
$rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
$rssfeed .= '<rss version="2.0" 
xmlns:content="http://purl.org/rss/1.0/modules/content/">';
$rssfeed .= '
<channel>';
$rssfeed .= '
  <title>Zakerxa</title>';
$rssfeed .= '
  <link>'.$http.$_SERVER['SERVER_NAME'].'</link>';
$rssfeed .= '
  <description>Zakerxa RSS feed</description>';
$rssfeed .= '
  <language>en-us</language>';
$rssfeed .= '
  <copyright>Copyright (C) '.date("Y").' '.$http.$_SERVER['SERVER_NAME'].'</copyright>';

// Change variables accoring to database table fields
foreach($query as $row) {
  
    $rssfeed .= '

    <item>';
    $rssfeed .= '
      <title>' . $row['title'] . '</title>';
    $rssfeed .= '
      <pubDate>' . date("D, d M Y H:i:s O", strtotime($row['created_date'])) . '</pubDate>';
    // Replace URL according to website url patterns
    $rssfeed .= '
      <link>'.$http.$_SERVER['SERVER_NAME'].'/post/'.$row['blog_id'].'</link>';

    $rssfeed .= '
      <description>' . $row['fcontent'] . '</description>';
    $rssfeed .= '
      <guid>' .GUID(). '</guid>';
    $rssfeed .= '
      <author></author>';

    // Here is the link https://developers.facebook.com/docs/instant-articles/example-articles which explains the differen options for content body
    $rssfeed .= '
      <content:encoded>';
    $rssfeed .= '
       <![CDATA[';
    $rssfeed .= '
        <!doctype html>';
    $rssfeed .= '
        <html lang="en" prefix="op: http://media.facebook.com/op#">';
    $rssfeed .= '
        <head>';
    $rssfeed .= '
        <meta charset="utf-8">';   
    $rssfeed .= '
        <link rel="canonical" href="'.$http.$_SERVER['SERVER_NAME'].'/post/'.$row['blog_id'].'">';
    $rssfeed .= '
        <meta property="op:markup_version" content="v1.0">';
    $rssfeed .= '
        <meta property="og:url" content="'.$http.$_SERVER['SERVER_NAME'].'" />';
    $rssfeed .= '
        <meta property="og:title" content="' . $row['title'] . '">';
    $rssfeed .= '
        <meta property="og:description" content="' . $row['fcontent'] . '">';
    $rssfeed .= '
        <meta property="og:image" content="'.$http.$_SERVER['SERVER_NAME'].'/images/'.$row['blog_id'].'/'.$row['pimg'].'">';
    $rssfeed .= '
     </head>';
    $rssfeed .= '
    <body>';

    $rssfeed .= '
     <article>';

    //  Header Start
    $rssfeed .= '
      <header>';
   
    $rssfeed .= '
      <figure>';
    $rssfeed .= '
      <img src="'.$http.$_SERVER['SERVER_NAME'].'/images/'.$row['blog_id'].'/'.$row['pimg'].'" />';
    $rssfeed .= '
      <figcaption>' . $row['title'] . '</figcaption>';
    $rssfeed .= '
      </figure>'; 

    $rssfeed .= '
      <h1>' . $row['title'] . '</h1>';
    $rssfeed .= '
      <h2>' . $row['fcontent'] . '</h2>';
    
    $rssfeed .= '<time class="op-published" datetime="' . date("D, d M Y H:i:s O", strtotime($row['created_date'])) . '">' . date("D, d M Y H:i:s O", strtotime($row['created_date'])) . '</time>';
    $rssfeed .= '<time class="op-modified" dateTime="' . date("D, d M Y H:i:s O", strtotime($row['modified_date'])) . '">' . date("D, d M Y H:i:s O", strtotime($row['modified_date'])) . '</time>';

    $rssfeed .= '</header>';
    //  Header End

    if(!empty($row['fcontent'])){
        $rssfeed .= '<p> '.$row['fcontent'].' </p>';
    }

    if(!empty($row['fimg'])){
        $rssfeed .= '<figure data-mode="fullscreen">';
        $rssfeed .= '<img src="'.$http.$_SERVER['SERVER_NAME'].'/images/'.$row['blog_id'].'/'.$row['fimg'].'" />';
        $rssfeed .= '</figure>';
    }

    if(!empty($row['scontent'])){
        $rssfeed .= '<p> '.$row['scontent'].' </p>';
    }
    
    if(!empty($row['simg'])){
        $rssfeed .= '<figure data-mode="fullscreen">';
        $rssfeed .= '<img src="'.$http.$_SERVER['SERVER_NAME'].'/images/'.$row['blog_id'].'/'.$row['simg'].'" />';
        $rssfeed .= '</figure>';
    }

    if(!empty($row['tcontent'])){
        $rssfeed .= '<p> '.$row['tcontent'].' </p>';
    }

    if(!empty($row['timg'])){
        $rssfeed .= '<figure data-mode="fullscreen">';
        $rssfeed .= '<img src="'.$http.$_SERVER['SERVER_NAME'].'/images/'.$row['blog_id'].'/'.$row['timg'].'" />';
        $rssfeed .= '</figure>';
    }

    if(!empty($row['focontent'])){
        $rssfeed .= '<p> '.$row['focontent'].' </p>';
    }
    
    if(!empty($row['foimg'])){
        $rssfeed .= '<figure data-mode="fullscreen">';
        $rssfeed .= '<img src="'.$http.$_SERVER['SERVER_NAME'].'/images/'.$row['blog_id'].'/'.$row['foimg'].'" />';
        $rssfeed .= '</figure>';
    }

    if(!empty($row['ficontent'])){
        $rssfeed .= '<p> '.$row['ficontent'].' </p>';
    }

    if(empty($row['link'])){
                                 
    }else { $length = strlen($row['link']); 
       
      if($length == 28){ $full_length_youtube = $row['link'];   $youtube = substr("$full_length_youtube",17);

         // Optional :  please reveiw Guide line https://developers.facebook.com/docs/instant-articles/reference/embeds
         $rssfeed .= '<figure class="op-interactive">';
         $rssfeed .= '<iframe class="column-width" height="180" width="320" src="https://www.youtube.com/embed/'.$youtube.'"></iframe>';

      }else {  $facebook = $row['link'];   
          // Your Facebook embedded video player code 
          $rssfeed .='<div class="fb-video" data-href="'.$facebook.'" data-width="500" data-show-text="false"></div>';                         
       } 
    
    } 

    $rssfeed .= '<figcaption>' . $row['title'] . '</figcaption>';
    $rssfeed .= '</figure>'; 

    $rssfeed .= '<footer>';
    $rssfeed .= '<aside>Managed By legendgaming.zakerxa.com</aside>';
    $rssfeed .= '<small>Copyright (C) '.date("Y").' legendgaming.zakerxa.com</small>';
    $rssfeed .= '</footer>';
    $rssfeed .= '</article>';

    $rssfeed .= '
      </body>';
    $rssfeed .= '
    </html>';
    $rssfeed .= ']]>';
    $rssfeed .= '</content:encoded>';
    $rssfeed .= '
    </item>';
}

$rssfeed .= '
</channel>';
$rssfeed .= '
</rss>';

echo $rssfeed;

?>