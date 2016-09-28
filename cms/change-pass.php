<?php
session_start();
include('../config/db.php');

$o_pass = mysql_real_escape_string($_POST['oldPassword']);
$new_pass = mysql_real_escape_string($_POST['newPassword']);
$r_pass = mysql_real_escape_string($_POST['repeatPassword']);
$o_pass_hash = md5($o_pass);

$q = "SELECT * FROM `cms` WHERE password = '$o_pass_hash'";
$res = mysql_query($q);
$num = mysql_num_rows($res);
$row = mysql_fetch_array($res);

if($num == 0)
{
	header("Location: edit-admin.php?err=1");
	exit;
} 
if($o_pass == $new_pass)
{
	header("Location: edit-admin.php?err=4");
	exit;
}

if(empty($new_pass) || empty($r_pass))
{
	header("Location: edit-admin.php?err=3");
	exit;
}


if($new_pass != $r_pass)
{
	header("Location: edit-admin.php?err=2");
	exit;
}

$new_pass_hash = md5($new_pass);

$query = "UPDATE `cms` SET `password`='$new_pass_hash' WHERE 1";
if(mysql_query($query))
{
	header("Location: edit-admin.php?success=1");
}
else
{
	echo "<h2>There was some error. Please try again..</h2>";
}