<?php
session_start();
header("Content-type: image/png");


$image = imagecreate(400, 200);

$back = imagecolorallocate($image, rand(0,100),rand(0,100),rand(0,100));


$listOfChars = "azertyuiopqsdfghjklmwxcvbn1234567890";
$listOfChars = str_shuffle($listOfChars);
$captcha = substr($listOfChars, 0, rand(6,8));
$_SESSION['captcha'] = $captcha;

//imagestring($image, 5, 20, 80, $captcha, $color);


$listOfFonts = glob("fonts/*.ttf");

$x = 20;
for($i=0; $i<strlen($captcha); $i++)
{
	$listOfColors[] = imagecolorallocate($image, rand(150,255),rand(150,255),rand(150,255));

	imagettftext($image, 
		rand(40,45), 
		rand(-20, 20), 
		$x, 
		rand(80,130), 
		$listOfColors[$i], 
		$listOfFonts[array_rand($listOfFonts)]
		, $captcha[$i]);

	$x += rand(40,50);
}




$form = rand(3, 5);

for($i=0 ; $i<$form; $i++)
{


	imagerectangle($image,rand(0, 400), rand(0,200), rand(0, 400), rand(0,200), $listOfColors[array_rand($listOfColors)]);


	imageellipse($image,rand(0, 400), rand(0,200), rand(0, 400), rand(0,200), $listOfColors[array_rand($listOfColors)]);


	imageline($image,rand(0, 400), rand(0,200), rand(0, 400), rand(0,200), $listOfColors[array_rand($listOfColors)]);

}



imagepng($image);