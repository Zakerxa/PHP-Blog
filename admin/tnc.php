<?php
        
function nc($n, $precision = 1)
{
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
    // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ($precision > 0) {
        $dotzero = '.' . str_repeat('0', $precision);
        $n_format = str_replace($dotzero, '', $n_format);
    }

    return $n_format . $suffix;
}

function dnc($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//  Site Logo
$sitestmt = $pdo->prepare("SELECT * FROM site");
$site = $sitestmt->execute();
$site = $sitestmt->fetch(PDO::FETCH_ASSOC);

// Adsense Code
$stmtads = $pdo->prepare("SELECT * FROM ads LIMIT 1");
$adsense = $stmtads->execute();
$adsense = $stmtads->fetch(PDO::FETCH_ASSOC);

//  Trending New
$stmtmaxview = $pdo->prepare("SELECT * FROM blogs ORDER BY views DESC LIMIT 4");
$maxview = $stmtmaxview->execute();
$maxview = $stmtmaxview->fetchAll();

$mostcat = [];

foreach ($maxview as $key => $value) {
    $blog_id = $maxview[$key]['category'];
    $stmtmostviewcat = $pdo->prepare("SELECT * FROM categories WHERE id=$blog_id");
    $stmtmostviewcat->execute();
    $mostcat[] = $stmtmostviewcat->fetchAll();
}
