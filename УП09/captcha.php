<?php

define('USE_SESSION', true);

$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
$length = 6;
$code = substr(str_shuffle($chars), 0, $length);

if (USE_SESSION) {
  session_start();
  $_SESSION['captcha'] =  crypt($code, '$1$itchief$7');
  session_write_close();
} else {
  $value = crypt($code, '$1$itchief$7');
  $expires = time() + 600;
  setcookie('captcha', $value, $expires, '/', 'test.ru', false, true);
}

$image = imagecreatefrompng('img/captcha.png'); // Replace with the actual path to the captcha.png file
$size = 36;
$color = imagecolorallocate($image, 66, 182, 66);
$font = 'oswald.ttf'; // Replace with the actual path to the oswald.ttf font file
$angle = rand(-10, 10);
$x = 56;
$y = 64;
imagefttext($image, $size, $angle, $x, $y, $color, $font, $code);

header('Cache-Control: no-store, must-revalidate');
header('Expires: 0');
header('Content-Type: image/png');

imagepng($image);
imagedestroy($image);