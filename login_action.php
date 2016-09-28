<?php
	session_start();
	include('config/db.php');
	function isRealDate($date) 
{ 
    if (false === strtotime($date)) 
    { 
        return false;
    } 
    else
    { 
        list($year, $month, $day) = explode('-', $date); 
        if (false === checkdate($day, $month, $year)) 
        { 
            return false;
        } 
    } 
    return true;
}

	$post = $_POST['post'];
	$no_of_person = $_POST['person'];
	$salary = $_POST['salary'];
	$duration = $_POST['duration'];
	$job_desc = $_POST['jobDesc'];
	$sub_date = $_POST['submission'];
	$sub_date = date("Y-m-d", strtotime($sub_date));
	$today = date("Y-m-d");
	$today = strtotime($today);
	$s = strtotime($sub_date);
	$time_left = $s - $today;
	$company_id = $_SESSION['id'];
	

	if(!empty($post) && !empty($no_of_person) && !empty($salary) && !empty($duration) && !empty($job_desc) && !empty($sub_date))
	{
		if(is_numeric($no_of_person) && is_numeric($salary))
		{
			if($no_of_person <= 0)
			{
				echo "<h2>Person less than one is not possible.</h2>";
				exit;
			}
			if($salary <= 100)
			{
				echo "<h2>Salary cannot be less than 100.</h2>";
				exit;
			}
		}

		if(isRealDate($sub_date))
		{
			if($time_left <= 0)
			{
				echo "<h2>This date has already past. Choose another date.</h2>";
				exit;
			}
			else
			{
				echo "<h2>Date is not valid.</h2>";
				exit;
			}	
		}
		$q = "INSERT INTO `post_job`(`id`, `post`, `no_of_person`, `salary`, `duration`, `job_desc`, `deadline`, `company_id`) VALUES (NULL,'$post','$no_of_person','$salary','$duration','$job_desc','$sub_date', '$company_id');";
		mysql_query($q);
		header("Location: login.php?success=1");
	}
	else
	{
		echo "<h2>Please fill the form completely.</h2>";
		exit;
	}
?>