<?php
	session_start();
	include('../config/db.php');
	
	$company_name = $_POST['name'];
	$person_name = $_POST['person_name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$id = $_GET['id'];
	
	$q = "UPDATE `company` SET `name`='$company_name',`person_name`='$person_name',`phone`='$phone',`email`='$email',`password`='$password' WHERE id = '$id'";
	mysql_query($q);
	header("Location: viewcompany.php?yahoo=1");