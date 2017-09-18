<?
session_start();
 
header ("Content-type: image/png");
$COD1 = strtoupper(substr(md5(date("YmdHis")),0,2));
$COD2 = strtoupper(substr(md5(date("YmdHis")),4,3));
$COD3 = strtoupper(substr(md5(date("YmdHis")),8,2));
$_SESSION['cod'] = 'DBXT2'.$COD1.$COD2.$COD3;
$font   = 8;
$width  = ImageFontWidth($font) * 6;
$height = ImageFontHeight($font)*1.5;
 
$im = @imagecreate ($width,$height);
$background_color = imagecolorallocate ($im, 255, 255, 255); 
$text_color = imagecolorallocate ($im, rand(0,155), rand(0,155),155);
$text_color2 = imagecolorallocate ($im, 155, rand(0,155),rand(0,155));
$text_color3 = imagecolorallocate ($im, rand(0,155), 155,rand(0,155));

imagestring ($im, $font, 0, 1,  $COD1, $text_color);
imagestring ($im, 4, 15, 6,  $COD2, $text_color2);
imagestring ($im, 10, 36, 3,  $COD3, $text_color3);

imagepng ($im);

?>
