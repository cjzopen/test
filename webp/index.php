<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8" />
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes"/>
  <link rel="shortcut icon" href="ico url">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php
$imgname = 'tick-icon.png';
$im = imagecreatefrompng($imgname);
// $im = imagecreatetruecolor(120, 20);
// $text_color = imagecolorallocate($im, 233, 14, 91);

// imagestring($im, 1, 5, 5,  'WebP with PHP', $text_color);

// Save the image
imagewebp($im, 'tick-icon.webp');

// Free up memory
imagedestroy($im);
echo '<img src="tick-icon.webp" alt="">';
?>

</body>
</html>
