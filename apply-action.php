<?php
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


if(empty($_POST['name']) && empty($_POST['number']) && empty($_POST['p_zone']) && empty($_POST['p_district']) && empty($_POST['p_vdc']) && empty($_POST['p_ward']) && empty($_POST['t_zone']) && empty($_POST['t_district']) && empty($_POST['t_vdc']) && empty($_POST['t_ward']) && empty($_POST['phone']) && empty($_POST['mobile']) && empty($_POST['email']) && empty($_FILES['file']))
{
	header("Location: apply.php?err=1");
	exit;
}
$name = htmlentities($_POST['name']);
$number = htmlentities($_POST['number']);
$dob = htmlentities($_POST['dob']);
$p_zone = htmlentities($_POST['p_zone']);
$p_district = htmlentities($_POST['p_district']);
$p_vdc = htmlentities($_POST['p_vdc']);
$p_ward = htmlentities($_POST['p_ward']);
$t_zone = htmlentities($_POST['t_zone']);
$t_district = htmlentities($_POST['t_district']);
$t_vdc = htmlentities($_POST['t_vdc']);
$t_ward = htmlentities($_POST['t_ward']);
$phone = htmlentities($_POST['phone']);
$mobile = htmlentities($_POST['mobile']);
$email = htmlentities($_POST['email']);
$id = $_GET['id'];

$q = "SELECT * FROM `post_job` WHERE id = '$id'";
$res = mysql_query($q);
$num = mysql_num_rows($res);
if($num ==0 && $_GET['id']!=0)
{
	echo "<h1>This post is not available.</h1>";
	exit;
}
$row = mysql_fetch_array($res);
$company_id = $row['company_id'];
$q1 = "SELECT * FROM `company` WHERE id = '$company_id'";
$res1 = mysql_query($q1);
$row1 = mysql_fetch_array($res1);

$university = array();
$programme = array();
$division = array();
$year = array();

if(!empty($_POST['university1']) && !empty($_POST['programme1']) && !empty($_POST['division1']) && !empty($_POST['year1']) )
	{
		array_push($university, $_POST['university1']);
		array_push($programme, $_POST['programme1']);
		array_push($division, $_POST['division1']);
		array_push($year, $_POST['year1']);
	}

if(!empty($_POST['university2']) && !empty($_POST['programme2']) && !empty($_POST['division2']) && !empty($_POST['year2']) )
	{
		array_push($university, $_POST['university2']);
		array_push($programme, $_POST['programme2']);
		array_push($division, $_POST['division2']);
		array_push($year, $_POST['year2']);
	}
if(!empty($_POST['university3']) && !empty($_POST['programme3']) && !empty($_POST['division3']) && !empty($_POST['year3']) )
	{
		array_push($university, $_POST['university3']);
		array_push($programme, $_POST['programme3']);
		array_push($division, $_POST['division3']);
		array_push($year, $_POST['year3']);
	}

if(!empty($_POST['university4']) && !empty($_POST['programme4']) && !empty($_POST['division4']) && !empty($_POST['year4']) )
	{
		array_push($university, $_POST['university4']);
		array_push($programme, $_POST['programme4']);
		array_push($division, $_POST['division4']);
		array_push($year, $_POST['year4']);
	}

if(!empty($_POST['university5']) && !empty($_POST['programme5']) && !empty($_POST['division5']) && !empty($_POST['year5']) )
	{
		array_push($university, $_POST['university5']);
		array_push($programme, $_POST['programme5']);
		array_push($division, $_POST['division5']);
		array_push($year, $_POST['year5']);
	}

if(!empty($_POST['university6']) && !empty($_POST['programme6']) && !empty($_POST['division6']) && !empty($_POST['year6']) )
	{
		array_push($university, $_POST['university6']);
		array_push($programme, $_POST['programme6']);
		array_push($division, $_POST['division6']);
		array_push($year, $_POST['year6']);
	}

if(file_exists($_FILES['file']['tmp_name']))
{
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	 
	 // new file size in KB
	 $new_size = $file_size/1024;  
	
	 
	 // make file name in lower case
	 $new_file_name = strtolower($file);
	 
	 $final_file=str_replace(' ','-',$new_file_name);
	 
	 move_uploaded_file($file_loc,$folder.$final_file);
}
else
{
	echo "<h1>Submit your resume!!</h1>";
	exit;
}
$count = count($university);

?>
<?php
	$to = 'shishirthapa1@gmail.com';

	$subject = 'Application';

	$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	$message = '<html><body>';
	if($id != 0)
	{
		$message .= '<label>Applied Post: </label> '.$row['post'].' ?><br /><br />';
		$message .= '<label>Post By: </label> '.$row1['name'].' ?><br /><br />';
	}
	$message .= '<label>Name: </label> '.$name.' <br /><br />';
	$message .= '<label>Citizenship No: </label> '. $number.'<br /><br />';
	$message .='<label>Permanent Address:</label><pre>';
	$message .='<label>Zone:</label> '. $p_zone.'<br /><br />';
	$message .='<label>District: </label>'. $p_district.'<br /><br />';
	$message .='<label>VDC/Municiplaity:</label> '. $p_vdc.'<br /><br />';
	$message .='<label>Ward No: </label> '. $p_ward.'<br /><br /></pre>';
	$message .=			'<label>Temporary Address:</label><pre>';
	$message .=			'<label>Zone:</label> '. $t_zone.'<br /><br />';
	$message .=			'<label>District: </label> '. $t_district.'<br /><br />';
	$message .=			'<label>VDC/Municiplaity: </label> '. $t_vdc.'<br /><br />';
	$message .=			'<label>Ward No: </label> '. $t_ward .'<br /><br /></pre>';
	$message .=			'<label>Phone no: </label> '. $phone.'<br /><br />';
	$message .=			'<label>Mobile no: </label>'. $mobile .'<br /><br />';
	$message .=			'<label>Email Address: </label>'. $email .'<br /><br />';
	$message .=			'<table border="1" cellpadding="5" cellspacing="0">';
	$message .=				'<thead><td colspan="5">Academic Qualification</thead>';
	$message .=				'<tr>';
	$message .=					'<td><b>S.N</b></td>';
	$message .=					'<td><b>University/Board</b></td>';
	$message .=					'<td><b>Programme</b></td>';
	$message .=					'<td><b>Division</b></td>';
	$message .=					'<td><b>Passed Year</b></td>';
	$message .=				'</tr>';
				for($i=0; $i<$count; $i++)
						{
							$j = $i + 1;
	$message .=				'<tr>';
	$message .=					'<td>'.$j.'</td>';
	$message .=					'<td>'.$university[$i].'</td>';
	$message .=					'<td>'.$programme[$i].'</td>';
	$message .=					'<td>'.$division[$i].'</td>';
	$message .=					'<td>'.$year[$i].'</td>';
	$message .=				'</tr>';
						}  
	$message .=			'</table><br /> <br />'; 
	$message .= '<a href="uploads/'.$final_file.'" >Resume</a><br/>';
	$message .= '</html></body>';


if(mail($to, $subject, $message, $headers)){
    


?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank You</title>
</head>
<body>
	<div style="color:#FFF; background-color:green; height: 50px; font-size: 20px; padding: 10px; text-align:center;">Thank You.<br />Your resume has been submitted. </div>
	<a href="vacancy.php">Return Back</a>
</body>
</html>

<?php
	} else{
     echo '<h1>Unable to send email. Please try again.</h1>';
     exit;
 }

?>