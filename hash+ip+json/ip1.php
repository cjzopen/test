<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title></title>
    <meta name="description" content="">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php
$authUsers = array('justin'   => '宋昱霆',
                   'ouying'   => '歐音',
                   'carrie1415'  => '余沁薇',
                   'ting1890'  => '黃思婷',
                   'cj1895' => '陳弘哲'
                  );

$user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
$user = str_replace("aresoa/", '', $user);
$user = str_replace("aresoa\\", '', $user);

if (!array_key_exists($user, $authUsers)) {
    echo "沒有權限！";
    exit;
}

$fromName  = $authUsers[$user];
$fromEmail = $user."@ares.com.tw";

echo 'welcome '.$fromName.'<'.$fromEmail.'>';
// $user = str_replace("aresoa\\", '', strtolower($_SERVER['PHP_AUTH_USER']));
// $auth_users = array(
//     'justin',
//     'ouying',
//     'cj1895'
//     );

// if (!in_array($user, $auth_users)) {
//     die('沒有權限!');
// }

?>
</body>
</html>
