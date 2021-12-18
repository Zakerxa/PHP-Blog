<?php
include "./config/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE blog_id=:id");
$row = $stmt->execute(
    array(':id' => $id)
);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($row)) {
    header("location:../index.php");
    exit();
} else {
    header("Content-Type: text/rss;charset=iso-8859-1");
// header("Content-Type: application/rss+xml; charset=ISO-8859-1");
    $rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
    $rssfeed .= '<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/">';
    $rssfeed .= '
<channel>
    ';
    $rssfeed .= '<title>Zakerxa</title>';
    $rssfeed .= '
    <link>'.$http.$_SERVER['SERVER_NAME'].'</link>';
    $rssfeed .= '
    <description>Zakerxa RSS feed</description>';
    $rssfeed .= '<language>en-us</language>';
 
    $rssfeed .= '
    <item>';
    $rssfeed .= '
    <title>' . $row['title'] . '</title>';
    $rssfeed .= '
    <description>' . $row['fcontent'] . '</description>';
    $rssfeed .= '
    <link>'.$http.$_SERVER['SERVER_NAME'].'/post/' . $row['blog_id'] . '</link>';
    $rssfeed .= '
    <pubDate>' . date("D, d M Y H:i:s O", strtotime($row['created_date'])) . '</pubDate>';
    $rssfeed .= '
    </item>';
    $rssfeed .= '
</channel>';
    $rssfeed .= '
</rss>';
    echo $rssfeed;
}


