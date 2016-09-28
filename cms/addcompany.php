<?php
	session_start();
	if(!isset($_SESSION['login']) && $_SESSION['login']!='correct')
	{
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
	
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<div class="wrapper">
		<?php include('include-title.php') ?>
		<br clear="all" />
		<div class="post_job">
			<h1>Add a new Company</h1><br /><br />
		<?php
			if(isset($_GET['success']) && $_GET['success']=='1')
	{
		
?>
<div style="color:#FFF; background-color:green; height: 50px; font-size: 20px; padding: 10px; text-align:center;">The company has been posted successfully.</div>
	<a href="addcompany.php">Return Back</a>&nbsp;||&nbsp;<a href="logout.php">Logout</a>
<?php
	exit;
	} 
?>
	<?php
			if(isset($_GET['err']) && $_GET['err']=='1')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">The username already exit. Choose another username.</div>
	
<?php
	
	} 
?>

<?php
			if(isset($_GET['err']) && $_GET['err']=='2')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">There was error sending the email.</div>
	
<?php
	
	} 
?>
				<form action="addcompany_action.php" method="post" enctype="multipart/form-data"><br />
					<label>Company Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="name" name="name" required /><br /><br />
					<label>Person Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="person_name" name="person_name" required /><br /><br />
					<label>Phone no:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="phone" name="phone" required /><br /><br />
					<label>Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" id="email" name="email" required /><br /><br />
					<label>Username:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="username" name="username" required /><br /><br />
					<label>Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="password" name="password" required /><br /><br />
					<label>Company Logo:</label><input type="file" id="image" name="image" required /><br /><br />
					<input type="submit" id="submit" name="submit" value="Add Company" />
				</form>
			</div>
		</div>
</body>
</html>