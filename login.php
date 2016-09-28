<?php
	session_start();
	if(!isset($_SESSION['login']) && $_SESSION['login']!='yes')
	{
		header("Location: index.php");
		exit;
	}
	if($_SESSION['login']=='correct')
	{
		echo "<h2>You arenot allowed to visit this page..</h2>";
		exit;
	}
?>

<html>
	<head>
		<title>Log In</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
		<div class="wrapper">
		<div class="logout">
				<a href="logout.php">Logout</a>
		</div>
		<br clear="all" />
			<div class="post_job">
			<h1>Post Your Job Vacancy</h1><br /><br />
		<?php
			if(isset($_GET['success']) && $_GET['success']=='1')
	{
		
?>
<div style="color:#FFF; background-color:green; height: 50px; font-size: 20px; padding: 10px; text-align:center;">The job vacancy has been posted successfully.</div>
	<a href="login.php">Return Back</a>&nbsp;||&nbsp;<a href="logout.php">Logout</a>
<?php
	exit;
	} 
?>
				<form action="login_action.php" method="post" enctype="multipart/form-data"><br />
					<label>Required Post:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="post" name="post" required /><br /><br />
					<label>Persons required:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" id="person" name="person" required /><br /><br />
					<label>Salary:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" id="salary" name="salary" required /><br /><br />
					<label>Duration of job:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="duration" name="duration" required /><br /><br />
					<label>Job Description:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea id="jobDesc" name="jobDesc"></textarea><br /><br />
					<label>Submission Deadline:</label><input type="date" id="submission" name="submission" required /><br /><br />
					<input type="submit" id="submit" name="submit" value="Post Job Vacancy" />
				</form>
			</div>
		</div>

	</body>

</html>