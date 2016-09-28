<html>
	<head>
		<title>NITC LogIn</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
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
				<div class="logo"><h1>Vendor Log In</h1></div><br /><br />
			<form action="index_action.php" method="post" >
				<label>Username:    </label><input type="text" class="username"	name="username" placeholder="Enter username" /><br /><br />
				<label>Password:    </label><input type="password" class="password"	name="password" placeholder="Enter password" />
				<br /><br /><input type="submit" name="submit" class="submit" value="Login" />
				<a href="contact.html"><input type="button" name="button" class="button" value="Create your account" /></a>
			</form>
			<br /><p><font color="green"><i>In case you've forgotten your password please <a href="contact.html">contact our company.</a></i></font></p>
		</div>
	</div>

</body>
</html>