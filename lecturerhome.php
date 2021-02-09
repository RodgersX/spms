<?php session_start();?>
<?php 
require("connection.php");
?>
<html>
<head>
<title> Lecturer-HOME</title>
<link rel="stylesheet" type="text/css" href="maincss.css">

<style type="text/css">
	.matches {
		width: 50%;
	}
</style>
</head>

<body>
<?php include "menubar.php";?>


<?php 
if(!isset($_SESSION['LecNo'])){
echo '<div style="text-align:center;background-color:pink">
<h1>YOU MUST LOGIN FIRST</h1>
<a href="leclogin.php" > LOGIN </a><br /> 
</div>';
	
header('refresh:3; url="leclogin.php"');
die();
}

	

?>


<?php

$regno = $_SESSION['LecNo'];
$query = " SELECT * FROM lecturer WHERE LecNo='$regno' ";
$results = mysqli_query($conn, $query) or die (mysqli_error());
$project = mysqli_fetch_array($results);
//echo "<img src ='profileupload/".$project['PHOTO']."' width='150' height='150'>";
?>
 <table Id="studenthometable" border="0">
<tr>
<td>

<td colspan="3"><img src="images/lecportal.png" ></td>

</tr>


<tr><td colspan="3">
<?php
require("connection.php");
$regno = $_SESSION['LecNo'];
$query = " SELECT * FROM lecturer WHERE LecNo='$regno' ";	
$results = mysqli_query($conn, $query) or die (mysqli_error());
$project = mysqli_fetch_array($results);
 echo "<h4>Your Logged in as:  ".$project['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="leclogout-inc.php">LOGOUT</a></h4>';?>
</td>
</tr>
<tr  text-align = "center"> 
	<td colspan="3"> 
	
	
</td></tr>
<tr>

<td width="200px">
<?php 
	require("connection.php");
	$User = $_SESSION['LecNo'];
	//getting list of students you are supervising
	echo "<h1>list of students you are supervising</h1>";

	$query = "SELECT * FROM student WHERE Supervisor = '$User' ";
	$results = mysqli_query($conn,$query) or die (mysqli_error());
	echo '<table border="1"  style="text-align:center;background-color:pink">';
	echo "<tr><th>REG NO</th><th>NAME</th><th>STUDENTS' CONTACTS</th><th>PROJECT ID</th><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th></tr>";
	while($project = mysqli_fetch_array($results)){
		echo "<tr><td>".$project['RegNo']."</td><td>".$project['Name']."</td><td>".$project['Email']."</td><td>".$project['ProjectID']."</td><td>".$project['Title']."</td><td>".$project['Category']."</td><td>".$project['Abstract']."</td></tr>";
	}
	echo "</table>";

	//getting LIST STUDENTS WITHOUT SUPERVISORS
	$query = "SELECT * FROM student WHERE Supervisor = '' && ProjectID  != '' ";
	$results = mysqli_query($conn, $query) or die (mysqli_error());
	echo "<h1> LIST STUDENTS WITHOUT SUPERVISORS</h1>";
	echo '<table border="1"  style="text-align:center;background-color:pink">';
	echo "<tr><th>REG NO</th><th>NAME</th><th>STUDENTS' CONTACTS</th><th>PROJECT ID</th><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th></tr>";
	while($project = mysqli_fetch_array($results)){
	echo "<tr><td>".$project['RegNo']."</td><td>".$project['Name']."</td><td>".$project['Email']."</td><td>".$project['ProjectID']."</td><td>".$project['Title']."</td><td>".$project['Category']."</td><td>".$project['Abstract']."</td></tr>";
	}
	echo "</table><br /><br /><br /><br /><hr />";

	//getting list of students undertaking a projects
	$query = "SELECT * FROM student WHERE Title !='' ";
	$results = mysqli_query($conn, $query) or die (mysqli_error());
	echo "<h1>list of students undertaking a projects</h1>";
	echo '<table border="1"  style="text-align:center;background-color:pink">';
	echo "<tr><th>REG NO</th><th>NAME</th><th>STUDENTS' CONTACTS</th><th>PROJECT ID</th><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th></tr>";
	while($project = mysqli_fetch_array($results)){
	echo "<tr><td>".$project['RegNo']."</td><td>".$project['Name']."</td><td>".$project['Email']."</td><td>".$project['ProjectID']."</td><td>".$project['Title']."</td><td>".$project['Category']."</td><td>".$project['Abstract']."</td></tr>";
	}
	echo "</table><br /><br /><br /><br /><hr />";




?>
</td>

<td width="200px">
<div id="social">
<u>FOLLWO US</u><br />
<a href="#"  >Twitter</a><br />
<a href="#" >Facebook</a><br />
<a href="#" >Instagram</a><br />
<a href="#">google+<br />
<a href="#">youtube</a><br />
<a href="#">hotmail</a><br />
</div>
</td>
<tr>

</tr>


<tr><td colspan="3" style="background:#348017;" >Copyright &#169 2020</td></tr>
</table>



<body>
</html>