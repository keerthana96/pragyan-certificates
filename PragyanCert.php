<?php
//$type = "Merit" or "Participation" or "Workshop" or "PCA" or "Appreciation"
//$A4ornot = 1  if A4 else $a$ornot = 0
//$eventName = name of the event for COP's and COM's. And is the workshop name for Workshops
//$prize = NULL in the case of COP's and Workshops

function CertificateWrite($type,$A4ornot,$participantName,$pragyanId,$collegeName,$eventName,$prize)
{
	// Text Color - black
	$black = imagecolorallocate($image, 0, 0, 0);

	putenv('GDFONTPATH=' . realpath('.'));
	// Set Path to Font File
	$font_path = 'PetitaMedium.ttf';

	if($A4ornot==1)
	{
		// Create plain image with same size as COP.jpg,COM.jpg,Workshop.jpg,COP_CPA.jpg and COA.jpg
		$image = imagecreatetruecolor(2480, 3508);

		//background color - white
		$white = imagecolorallocate($image, 255, 255, 255);
		imagefilledrectangle($image, 0, 0, 2480, 3508, $white);
	}

	if(strtolower($type)=="merit")
	{
		if($A4ornot==0)
		{
		// Create Image From Existing File - COM.jpg
			$image = imagecreatefromjpeg('COM.jpg');
		}

		// Print Text On Image
		imagettftext($image, 60, 0, 1150, 1660, $black, $font_path, $participantName);

		imagettftext($image, 60, 0, 1050, 1780, $black, $font_path, $pragyanId);

		imagettftext($image, 60, 0, 300, 1900, $black, $font_path, $collegeName);

		imagettftext($image, 60, 0, 700, 2020, $black, $font_path, $prize);

		imagettftext($image, 60, 0, 250, 2140, $black, $font_path, $eventName);
	}

	else if(strtolower($type)=="participation")
	{
		if($A4ornot==0)
		{
			// Create Image From Existing File - COP.jpg
			$image = imagecreatefromjpeg('COP.jpg');
		}

		// Print Text On Image
		imagettftext($image, 60, 0, 1150, 1660, $black, $font_path, $participantName);

		imagettftext($image, 60, 0, 1000, 1780, $black, $font_path, $pragyanId);

		imagettftext($image, 60, 0, 300, 1900, $black, $font_path, $collegeName);

		imagettftext($image, 60, 0, 300, 2020, $black, $font_path, $eventName);
	}

	else if(strtolower($type)=="workshop")
	{
		if($A4ornot==0)
		{
			// Create Image From Existing File - Workshop.jpg
			$image = imagecreatefromjpeg('Workshop.jpg');
		}

		// Print Text On Image
		imagettftext($image, 60, 0, 1150, 1660, $black, $font_path, $participantName);

		imagettftext($image, 60, 0, 1000, 1780, $black, $font_path, $pragyanId);

		imagettftext($image, 60, 0, 250, 1900, $black, $font_path, $collegeName);

		imagettftext($image, 60, 0, 250, 2020, $black, $font_path, $eventName);
	}

	else if(strtolower($type)=="pca")
	{
		if($A4ornot==0)
		{
			// Create Image From Existing File - COP_PCA.jpg
			$image = imagecreatefromjpeg('COP_PCA.jpg');
		}

		// Print Text On Image
		imagettftext($image, 60, 0, 550, 1780, $black, $font_path, $participantName);

		imagettftext($image, 60, 0, 250, 1900, $black, $font_path, $collegeName);
	}

	else if(strtolower($type)=="appreciation")
	{
		if($A4ornot==0)
		{
			// Create Image From Existing File - COA.jpg
			$image = imagecreatefromjpeg('COA.jpg');
		}

		// Print Text On Image
		imagettftext($image, 60, 0, 500, 1780, $black, $font_path, $participantName);

		imagettftext($image, 60, 0, 800, 1900, $black, $font_path, $pragyanId);
	}

	header('Content-type: image/jpg');
	imagejpeg($image);

	imagedestroy($image);
}

?>