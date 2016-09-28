<?php

	include('config/db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vacancy</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	
			$(document).ready(function() {
  				$(".box3, .box4").hide();

  		$('.see').click(function() {
    		$(this).closest(".vacancyBox").find(".box3, .box4").toggle('fast');
    		$(this).val(function(i, value) {
     		 return value == 'See More' ? 'See Less' : 'See More';
    	});

  		});
	});
		
	</script>
</head>
<body>
	<div class="wrapper">
	
	<div class="resume">
			<a href="apply.php"><input type="button" id="resume" value="Submit your Resume" /></a>
		</div>
		<br clear="all" />
		<?php
			$date = strtotime(date("Y-m-d"));
			$q = "SELECT * FROM `post_job` ORDER BY id DESC";
			$res = mysql_query($q);
			$num = mysql_num_rows($res);
			if($num == 0)
			{
				echo "<h1>No vacancy available !!</h1>";
				exit;
			}
			else
			{
				for($i=1;$i<=$num;$i++)
				{
					$row = mysql_fetch_array($res);
					$postId = $row['id'];
					$deadline = strtotime($row['deadline']);
					if($deadline<=$date){
						$del = "DELETE FROM `post_job` WHERE id = '$postId'";
						mysql_query($del);
					}
					$company_id = $row['company_id'];
					$query = "SELECT * FROM company WHERE id='$company_id' ";
					$res1 = mysql_query($query);
						$row1 = mysql_fetch_array($res1);
						$query2 = "SELECT * FROM logo WHERE user_id='$company_id' ";
						$res2 = mysql_query($query2);
						$row2 = mysql_fetch_array($res2);

		?>
		<div class="vacancyBox">

			<div class="box1">
				<img src="logo/<?php echo $row2['logo_thumb']; ?>.jpg" />
				<h2><?php echo $row1['name']; ?></h2>
			</div>
			<br clear="all" />
			<div class="box2">
				<label>Post: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $row['post']; ?><br />
				<label>Salary: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $row['salary']; ?><br />
				<input type="button" class="see" value="See More" />
			</div>
			<div class="box3">
				<label>No of vacant seats: </label><?php echo $row['no_of_person']; ?><br />
				<label>Duration:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $row['duration']; ?><br /><br />
			</div>

			<hr />	
			<div class="box4">
				<p id="daysRemain"><font color="red"><?php $remaining_days = $deadline - $date;  $days = intval(intval($remaining_days)/(3600*24));
    if($days> 0)
    {
        $no_of_days= "$days ";
    } echo $no_of_days; ?></font> Days remaining</p><br />
				<label>Job Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $row['job_desc']; ?>
			</div>
			<div class="box5"><a href="apply.php?id=<?php echo $postId; ?>"><input type="button" name="apply" id="apply" value="Apply"></a></div>
			<br clear="all" />
		</div>
		<?php
			}
		}
		?>
	</div> 
</body>
</html>