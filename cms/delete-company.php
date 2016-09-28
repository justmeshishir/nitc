<?php
	session_start();
	include('../config/db.php');

	$id = $_GET['id'];
	$q = "DELETE FROM `company` WHERE id = '$id'";

	mysql_query($q);

	header("Location: viewcompany.php?delete=1");
?>