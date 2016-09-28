<!DOCTYPE html>
<html>
<head>
	<title>Apply</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<div class="wrapper">
		<?php
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
			}
			else{
				$id = 0;
			}
		?>
		<?php
			if(isset($_GET['err']) && $_GET['err']=='1')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">Please fill out all the fields.</div>
	
<?php
	
	} 
?>
<?php
			if(isset($_GET['err']) && $_GET['err']=='1')
	{
		
?>
<div style="color:#FFF; background-color:red; height: 25px; font-size: 20px; padding: 10px; text-align:center;">Please enter a valid email address.</div>
	
<?php
	
	} 
?>


		<div class="form_resume">
			<h1><u>Please fill out all the information below.</u></h1><br /><br />
			<form action="apply-action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
				<label>Name: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" id="name" required /><br /><br />
				<label>Citizenship No: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="number" id="number" required /><br /><br />
				<label>Date of Birth:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="date" name="dob" id="dob" /><br /><br />
				<label>Permanent Address:</label><pre>
				<label>Zone:</label> <input type="text" name="p_zone" id="p_zone" required /><br /><br />
				<label>District: </label> <input type="text" name="p_district" id="p_district" required /><br /><br />
				<label>VDC/Municiplaity: </label> <input type="text" name="p_vdc" id="p_vdc" required /><br /><br />
				<label>Ward No: </label> <input type="text" name="p_ward" id="p_ward" required /><br /><br /></pre>
				<label>Temporary Address:</label><pre>
				<label>Zone:</label> <input type="text" name="t_zone" id="t_zone" required /><br /><br />
				<label>District: </label> <input type="text" name="t_district" id="t_district" required /><br /><br />
				<label>VDC/Municiplaity: </label> <input type="text" name="t_vdc" id="t_vdc" required /><br /><br />
				<label>Ward No: </label> <input type="text" name="t_ward" id="t_ward" required /><br /><br /></pre>
				<label>Phone no: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phone" id="phone" required /><br /><br />
				<label>Mobile no: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mobile" id="mobile" required /><br /><br />
				<label>Email Address: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<input type="email" name="email" id="email" required /><br /><br />
				<table border="1" cellpadding="5" cellspacing="0">
					<thead><td colspan="5">Academic Qualification</thead>
					<tr>
						<td><b>S.N</b></td>
						<td><b>University/Board</b></td>
						<td><b>Programme</b></td>
						<td><b>Division</b></td>
						<td><b>Passes Year</b></td>
					</tr>
					<tr>
						<td>1</td>
						<td><input type="text" name="university1" /></td>
						<td><input type="text" name="programme1" /></td>
						<td><input type="text" name="division1" /></td>
						<td><input type="number" name="year1" /></td>
					</tr>
					<tr>
						<td>2</td>
						<td><input type="text" name="university2" /></td>
						<td><input type="text" name="programme2" /></td>
						<td><input type="text" name="division2" /></td>
						<td><input type="number" name="year2" /></td>
					</tr>
					<tr>
						<td>3</td>
						<td><input type="text" name="university3" /></td>
						<td><input type="text" name="programme3" /></td>
						<td><input type="text" name="division3" /></td>
						<td><input type="number" name="year3" /></td>
					</tr>
					<tr>
						<td>4</td>
						<td><input type="text" name="university4" /></td>
						<td><input type="text" name="programme4" /></td>
						<td><input type="text" name="division4" /></td>
						<td><input type="number" name="year4" /></td>
					</tr>
					<tr>
						<td>5</td>
						<td><input type="text" name="university5" /></td>
						<td><input type="text" name="programme5" /></td>
						<td><input type="text" name="division5" /></td>
						<td><input type="number" name="year5" /></td>
					</tr>
					<tr>
						<td>6</td>
						<td><input type="text" name="university6" /></td>
						<td><input type="text" name="programme6" /></td>
						<td><input type="text" name="division6" /></td>
						<td><input type="number" name="year6" /></td>
					</tr>
				</table><br /> <br />
				<label>Resume:</label> <input type="file" name="file" id="file" /><br /><br />
				<p>[Note: All the information above must match with the resume provided.]</p>
				<input type="submit" name="submit" id="submit" value="Submit" />
			</form>
		</div>
	</div>
</body>
</html>