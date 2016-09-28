<?php
session_start();
if(!isset($_SESSION['login'])&&$_SESSION['login']!='correct'){
header("Location: index.php");
exit;
}
if($_SESSION['login']=='yes')
	{
		echo "<h2>You arenot allowed to visit this page..</h2>";
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<div class="wrapper">
	<?php include('include-title.php') ?>
	<?php
			if(isset($_GET['success']) && $_GET['success']=='1')
	{
		
?>
<div style="color:#FFF; background-color:green; height: 50px; font-size: 20px; padding: 10px; text-align:center;">The password has been changed successfully.</div>
	<a href="edit-admin.php">Return Back</a>&nbsp;||&nbsp;<a href="logout.php">Logout</a>
<?php
	exit;
	} 
?>
<?php
			if(isset($_GET['err']) && $_GET['err']=='1')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">Sorry the old password donot match.</div>
	
<?php

	} 
?>
<?php
			if(isset($_GET['err']) && $_GET['err']=='2')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">Sorry the new password and repeated password donot match.</div>
	
<?php

	} 
?>
<?php
			if(isset($_GET['err']) && $_GET['err']=='3')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">Please type in new password.</div>
	
<?php

	} 
?>
<?php
			if(isset($_GET['err']) && $_GET['err']=='4')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">You cannot choose the same old password.</div>
	
<?php

	} 
?>
		<div class="form">
	    	<form method="post" action="change-pass.php" enctype="multipart/form-data">
		    	<h2>Change Password:</h2><br /><br />
		        <label>Old Password: </label><input type="password" class="oldPassword" id="oldPassword" name="oldPassword" placeholder="Enter old password" /><br /><br />
		        
		        <label>New Password: </label><input type="password" class="newPassword" id="newPassword" name="newPassword" placeholder="Enter new password" /><br /><br />
		        
		        <label>Repeat new Password: </label><input type="password" class="repeatPassword" id="repeatPassword" name="repeatPassword" placeholder="Repeat new password" /><br /><br />
		        <input type="submit" id="submit" name="submit" value="Save" />
	     	</form>
     </div>
	</div>	
</body>
</html>