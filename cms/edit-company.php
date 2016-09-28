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
include('../config/db.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit company</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="wrapper">
   
    <?php
		$id = $_GET['id'];
		$q = "SELECT * FROM company WHERE id='$id'";
		$res = mysql_query($q);
		$row = mysql_fetch_array($res);
	?>
    
    <div class="post_job">
        <h1 align="center">Edit company</h1><br /><br />
    	<form action="editcompany-action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        	<label>Company Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required /><br /><br />
                    <label>Person Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="person_name" name="person_name" value="<?php echo $row['person_name']; ?>" required /><br /><br />
                    <label>Phone no:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required /><br /><br />
                    <label>Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"required /><br /><br />
                    <label>Username(Username are not allowed to change):</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="5" color="gray"><?php echo $row['username']; ?></font><br /><br />
                    <label>Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required /><br /><br />
                    <br />
            <input type="submit" id="submit" name="submit" value="Save" />
        </form>
    </div>
    </div>
    
</body>
</html>