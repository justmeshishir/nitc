<?php
function imgresize($newheight,$newwidth,$filename,$newimage_name)
	{
	list($width, $height) = getimagesize($filename);
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefromjpeg($filename);
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	if(imagejpeg($thumb,$newimage_name,100))return true; else return false;
	}




//###########################################


function ImgUpload($field,$dir_path,$filename)
	{
	if($_FILES[$field]['type']=='image/jpeg'||$_FILES[$field]['type']=='image/jpg'||$_FILES[$field]['type']=='image/pjpeg'||$_FILES[$field]['type']=='image/gif' ||$_FILES[$field]['type']=='image/png')
		{
		$_FILES[$field]['name'] = $filename;
		$uploadfile = $dir_path . $_FILES[$field]['name'];
		if(move_uploaded_file($_FILES[$field]['tmp_name'], $uploadfile)){return true;}
		else return false;
		}
	else return false;
	}
	
//################################################


function ImageResizeWithCrop($newwidth,$newheight,$source,$destination)
	{
	$nw=$newwidth; //The Width Of The Thumbnails
	$nh=$newheight; //The Height Of The Thumbnails
$tpath = "images";//Path To Place Where Thumbnails Are Uploaded. No Trailing Slash
	$img = $source;
$dimensions = GetImageSize($img);
$thname = $destination;
$w=$dimensions[0];
$h=$dimensions[1];
$img2 = ImageCreateFromJpeg($img);
$thumb=ImageCreateTrueColor($nw,$nh);
$wm = $w/$nw;
$hm = $h/$nh;
$h_height = $nh/2;
$w_height = $nw/2;
if($w > $h)
	{
	$adjusted_width = $w / $hm;
	$half_width = $adjusted_width / 2;
	$int_width = $half_width - $w_height;
	ImageCopyResampled($thumb,$img2,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h); 
if(ImageJPEG($thumb,$thname,95))$err = false; else $err = true; 
	}
elseif(($w < $h) || ($w == $h))
	{
	$adjusted_height = $h / $wm;
	$half_height = $adjusted_height / 2;
	$int_height = $half_height - $h_height;
	ImageCopyResampled($thumb,$img2,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); 
	if(ImageJPEG($thumb,$thname,95))$err = false; else $err = true;
	}

else

	{

	ImageCopyResampled($thumb,$img2,0,0,0,0,$nw,$nh,$w,$h); 	

	if(ImageJPEG($thumb,$thname,95))$err = false; else $err = true; 

	}

$whiteColorIndex = imagecolorexact($img2,255,255,255);

$whiteColor = imagecolorsforindex($img2,$whiteColorIndex);

imagecolortransparent($img2,$whiteColor);

imagedestroy($img2);



if($err)return false; else return true;

	}



?>