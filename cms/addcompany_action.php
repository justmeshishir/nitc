<?php
	session_start();
	include('../config/db.php');
	include('../image_functions.php');
	$company_name = $_POST['name'];
	$person_name = $_POST['person_name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$user_query = "SELECT * FROM `company` WHERE BINARY username = BINARY '$username'";
	$user_res = mysql_query($user_query);
	$user_num = mysql_num_rows($user_res);
	if($user_num > 0)
	{
		header("Location: addcompany.php?err=1");
		exit;
	}

	$q = "INSERT INTO `company`(`id`, `name`, `person_name`, `phone`, `email`, `username`, `password`) VALUES (NULL,'$company_name','$person_name','$phone','$email','$username','$password')";

	if(mysql_query($q))
	{
		$id = mysql_insert_id();
		$image = $id.'.jpg';
		$image_thumb = $id.'_thumb.jpg';
		
		if(ImgUpload('image','../logo/',$image))
			{
				
				
				ImageResizeWithCrop(600,600,"../logo/$image","../logo/$image_thumb"); 
				
				
				$r = "INSERT INTO `logo`(`id`, `user_id`, `logo`, `logo_thumb`) VALUES (NULL,'$id','$image','$image_thumb');";
				mysql_query($r);	

				/* Sending email */

				$to = $email;
				$subject = "Sucessful";
				$txt = "Username:".' '.$username."\n"."Password: ".' '.$password;
				$headers = "From: NITC <shishirthapa1@gmail.com>";
				

				if(mail($to,$subject,$txt,$headers)){
					header("Location: addcompany.php?success=1");	
				}
				else{
					header("Location: addcompany.php?err=2");
				}
			}
			 
	}
?>