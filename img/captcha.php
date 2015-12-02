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

$img = imagecreatetruecolor(64*$s_len, 128);
imagefilledrectangle($img, 0, 0, 64*$s_len, 128, imagecolorallocate($img, 200, 200, 200));
$str = str($s_len);
for ($i = 0; $i < $s_len; $i++) {
  imagettftext($img, 64, mt_rand($rotation_min, $rotation_max), (64*$i)+mt_rand(0, 80), 64, imagecolorallocate($img, mt_rand($t_color_min[0], $t_color_max[0]), mt_rand($t_color_min[1], $t_color_max[1]), mt_rand($t_color_min[2], $t_color_max[2])), '../'.$fonts_dir.$fonts[mt_rand(0, count($fonts)-1)].'.ttf', $str[$i]);
}
setcookie($c_name, hash('sha256', $str), $c_expire, $c_path, $c_domain);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>
