<html>
	<head>
		<title>NITC Admin LogIn</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<div class="wrapper">
    
		<div class="loginBox">
        	<?php
if(isset($_GET['err']) && $_GET['err']=='yes')
	{
?>
<div style="color:#FFF; background-color:hsla(359,86%,62%,1.00); text-align:center;">Sorry..Username/Password Incorrect.<br> Try Again</div>
<?php
	}
?>
				<div class="logo"><h1>Admin Log In</h1></div><br /><br />
			<form action="index_action.php" method="post" >
				<label>Username:    </label><input type="text" class="username"	name="username" placeholder="Enter username" /><br /><br />
				<label>Password:    </label><input type="password" class="password"	name="password" placeholder="Enter password" />
				<br /><br /><input type="submit" name="submit" class="submit" value="Login" />
			</form>
		</div>
	</div>

</body>
</html>