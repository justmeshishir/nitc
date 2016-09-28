<?php
session_start();
include('config/db.php');
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);


$q = "SELECT * FROM company WHERE BINARY username = BINARY '$username' AND BINARY password = BINARY '$password'";
$result = mysql_query($q);

$num = mysql_num_rows($result);

if($num==0)
	{
		header("Location: index.php?err=yes");
		exit;
	}
else
	{
		$row = mysql_fetch_array($result);
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $row['id'];
		$_SESSION['login'] = 'yes';
		
		header("Location: login.php");
	}

?>