<?php session_start();?>

<?php 
	require("connection.php");
?>

<html>
	<head>
	<title> STUDENTS-LOGIN/REGISTER</title>
	<link rel="stylesheet" type="text/css" href="maincss.css">

	<style>
		#social a {
			text-decoration: none;
			display: block;
			margin: 1rem 0;
			color: black;
		}
	</style>


	</head>

	<body>
	<?php include "menubar.php";?>


	<?php 
	if(!isset($_SESSION['RegNo'])){
	echo '<div style="text-align:center;background-color:pink">
	<h1>YOU MUST LOGIN FIRST</h1>
	<a href="studentlogin.php" > LOGIN </a><br /> 
	</div>';
		
	header('refresh:3; url="studentlogin.php"');
	die();
	}

		

	?>

	<table Id="studenthometable" border="0">
	<tr>
	<td>
	<?php

	$regno = $_SESSION['RegNo'];
	$query = " SELECT * FROM student WHERE REGNO='$regno' ";
	$results = mysqli_query($conn, $query) or die (mysqli_error());
	$project = mysqli_fetch_array($results);
	//echo "<img src ='profileupload/".$project['PHOTO']."' width='150' height='150'>";
	?>
	</td>

	<td colspan="2"><img src="images/studentpotal.png" ></td></tr>

	<tr><td colspan="3">
	<?php
	require("connection.php");
	$regno = $_SESSION['RegNo'];
	$query = " SELECT * FROM student WHERE REGNO='$regno' ";
	$results = mysqli_query($conn, $query) or die (mysqli_error());
	$project = mysqli_fetch_array($results);
	echo "<h4>Your Logged in as:  ".$project['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="studentlogout-inc.php">LOGOUT</a></h4>';?>
	</td>
	</tr>

	<tr>

	<td width="200px">



	<div id="projectupdate" width="50px;">
		<h3><u>UPDATE/CHANGE YOUR PROJECT HERE </u></h3><br />
		<form method="POST" action="studenthome.php">
			<?php include "projectupdate.php";?>

			<label for="title">TITLE: </label>
			<input type="text" name="title" style="width: 100%; padding: 5px; margin-bottom: 10px;">
			<label for="category">CATEGORY: </label>
			<select name="category" style="width: 100%; padding: 5px;">
				<option></option>
				<option>Health</option>
				<option>Technolpoogy</option>
				<option>Agriculture</option>
				<option>Administration</option>
				<option>Finance</option>
			</select><br /><br />
			<label for="abstract">ABSTRACT</label>
			<textarea name="abstract" rows="10" cols="35" placeholder="A bit about your project"></textarea>

			<input type="submit" name="submit" value="UPDATE" style="margin-top: 1rem; padding: 3px 5px;">
		</form>
	</div>

	</td>
	<td style="text-align:center;">
	<?php
	if($project['Title']!=""){
	//getting data from studentsdetails table
	$results = mysqli_query($conn, $query) or die (mysqli_error());

	echo "<h1>PROJECT REGISTERED UNDER YOUR NAME:".$project['Title']."</h1>";
	echo '<table border="1"  style="text-align:center;background-color:pink">';
	echo "<tr><th>PROJECT ID</th><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th>";
	while($project = mysqli_fetch_array($results)){
	echo "<tr><td>".$project['ProjectID']."</td><td>".$project['Title']."</td><td>".$project['Category']."</td><td>".$project['Abstract']."</tr>";
	}
	echo "</table><br /><br /><br /><br /><hr />";

	}else{
		
		
	echo "<h1>NO PROJECT REGISTERED UNDER YOUR NAME: ".$project['Name']."</h1>";

	echo '
	<div id="projectregestration" width="300px;" >
	<h3><u>REGISTER YOUR PROJECT HERE </u></h3><br />';
	include "projectreg.php";
	echo '
	<form method="POST" action="studenthome.php">
	PROJECT ID:&nbsp;&nbsp;&nbsp;<input type="text" name="projectid"><br /><br />
	TITLE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="title"><br /><br />
	CATEGORY:&nbsp;&nbsp;
			<select name="category">
				<option></option>
				<option>Health</option>
				<option>Education</option>
				<option>Agriculture</option>
				<option>Technology</option>
				<option>Finance</option>
			</select><br /><br />
	ABSTRACT:<br /><textarea name="abstract" rows="10" cols="35">  </textarea><br /><br /><br />

	<input type="submit" name="submit2" value="REGISTER" style="margin-top: 1rem;">


	</form>
	</div>


	';


	}

	?>

	</td>
	<td width="300px">
	<div id="social" style="height: 400px;">
		<p style="text-decoration: underline; margin-bottom: 1rem;">FOLLOW US</p>
		<a href="#"  >Twitter</a>
		<a href="#" >Facebook</a>
		<a href="#" >Instagram</a>
		<a href="#">google+
		<a href="#">youtube</a>
		<a href="#">hotmail</a>
	</div>
	</td>
	</tr>
	<tr><td colspan="3" style="background:#348017;" >Copyright &#169 2020</td></tr>
	</table>
	<body>
</html>