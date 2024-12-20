<?php
header('Content-Type: image/jpeg');

$data = array(3000, 2470, 225, 663, 6666, 3456, 789);
$height = 255;
$width = 320;
$image = imagecreate($width, $height);


$white = imagecolorallocate($image, 240, 240, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$pink = imagecolorallocate($image, 255, 192, 203);


imageline($image, 10, 5, 10, 230, $black);
imageline($image, 10, 230, 300, 230, $black);

$x = 15;
$y = 230;
$x_width = 20;
$y_ht = 0;
$sum = array_sum($data);

for ($i = 0; $i < count($data); $i++) {
    
    $y_ht = ($data[$i] / $sum) * ($height - 5);
    imagefilledrectangle($image, $x, $y, $x + $x_width, ($y - $y_ht), $pink);
    imagestring($image, 2, $x - 1, $y + 10, $data[$i], $black);
    $x += ($x_width + 20);
}


$name = "AMAR SYAHMI "; 
$matric_no = "AI220132";
$text = "$name| $matric_no";


$font_size = 2; 
$text_width = imagefontwidth($font_size) * strlen($text);
$text_height = imagefontheight($font_size);


$text_x = $width - $text_width - 10; 
$text_y = 5; 


imagestring($image, $font_size, $text_x, $text_y, $text, $black);

imagejpeg($image);
imagedestroy($image);
?>