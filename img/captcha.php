<?php
include "../config.php";
function char () {
  $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~";
  $i = mt_rand(0, 61);
  return $alphabet[$i];
}

function str ($len) {
  $s = "";
  for ($i = 0; $i < $len; $i++) {
    $s .= char();
  }
  return $s;
}

$img = imagecreatetruecolor(384, 128);
imagefilledrectangle($img, 0, 0, 384, 128, imagecolorallocate($img, 200, 200, 200));
$str = str(6);
$fonts = array("arial", "ubuntu", "verdana");
for ($i = 0; $i < 6; $i++) {
  imagettftext($img, 64, mt_rand(0, 90), (64*$i)+mt_rand(0, 80), 64, imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)), '../fonts/'.$fonts[mt_rand(0, 2)].'.ttf', $str[$i]);
}
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
setcookie($c_name, hash('sha256', $str), $c_expire, $c_path, $c_domain);
?>
