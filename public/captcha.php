<?php
session_start();

$code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 5);
$_SESSION['captcha'] = $code;

$img = imagecreate(120, 40);
$bg = imagecolorallocate($img, 255, 255, 255);
$text = imagecolorallocate($img, 0, 0, 0);

imagestring($img, 5, 30, 10, $code, $text);

header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
