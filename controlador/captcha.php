<?php
	session_start();
	$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890"; 
	$numerodeletras=5; 
	$cadena = ""; 
	for($i=0;$i<$numerodeletras;$i++)
	{
		$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
	}
	$salt = sha1(md5($cadena)).date('B'); 
	$_SESSION['cadena'] = $salt;
	$_SESSION['tmptxt'] = $cadena;
	header('Content-Type: image/png');
	$im = imagecreatetruecolor(130, 50);
	$blanco = imagecolorallocate($im, 255, 255, 255);
	$gris = imagecolorallocate($im, 128, 128, 128);
	$negro = imagecolorallocate($im, 0, 0, 0);
	imagefilledrectangle($im, 0, 0, 129, 49, $blanco);
	$texto = $_SESSION['tmptxt'];
	$fuente = '../vista/fonts/PWScolarpaper.ttf';
	imagettftext($im, 25, 6, 16, 36, $gris, $fuente, $texto);
	imagettftext($im, 25, 0, 15, 37, $negro, $fuente, $texto);
	imagepng($im);
	imagedestroy($im);
?>
