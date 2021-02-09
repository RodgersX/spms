<?php session_start();?>
<?php 
require("connection.php");
?>
<html>
<head>
<title> STUDENTS-LOGIN/REGISTER</title>
<!-- <link rel="stylesheet" type="text/css" href="maincss.css"> -->

<style type="text/css">

</style>
</head>

<body>
<?php include "menubar.php";?>


<?php 
if(!isset($_SESSION['RegNo'])){
echo '<div style="text-align:center;background-color:pink">
<h1>YOU MUST LOGIN FIRST</h1>
<a href="studentlogin.php"> LOGIN </a><br /> 
</div>';
	
header('refresh:3; url="studentlogin.php"');
die();
}

?>

<?php

	$regno = $_SESSION['RegNo'];
	$query = " SELECT * FROM student WHERE REGNO='$regno' ";
	$results = mysqli_query($conn, $query) or die (mysqli_error());
	$project = mysqli_fetch_array($results);
	//echo "<img src ='profileupload/".$project['PHOTO']."' width='150' height='150'>";
?>
  
<div style="width: 80%; margin: 0 auto;">
	<img src="images/studentpotal.png" >
</div>

<div style="width: 80%; margin: 0 auto;">
	<?php
		require("connection.php");
		$regno = $_SESSION['RegNo'];
		$query = " SELECT * FROM student WHERE REGNO='$regno' ";
		$results = mysqli_query($conn, $query) or die (mysqli_error());
		$project = mysqli_fetch_array($results);
		 echo "<h4>Your Logged in as:  ".$project['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="studentlogout-inc.php">LOGOUT</a></h4>';?>

		<form name="buttons">
			<div class="input-group">
				<input type=button onClick="location.href='search.php'" value='Search Trending Topics'>
			</div>
			<div class="input-group">
			  	<input type=button onClick="location.href='news.php'" value='View Trending Topics'>
			</div>

		</form>
		<div class="matches">
			<?php 
				require_once ("connection.php");

				$regno = $_SESSION['RegNo'];
				$sql = "SELECT * FROM student WHERE Supervisor = '' and RegNo = '$regno' ";
				$result = mysqli_query($conn, $sql);

				$supervisor = "SELECT * FROM lecturer";
				$result1 = mysqli_query($conn, $supervisor);

				$rowStud = mysqli_fetch_assoc($result);

				// $row = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) > 0) {
					echo "<h1>Below are supervisors you could choose</h1>";
					echo '<table border="1"  style="text-align:center;background-color:pink;">';
					echo "<tr><th>Project Title</th><th>Category</th><th>Lecturer Name</th><th>Field/Expertise</th><th>%</th>";
					while($rowLec = mysqli_fetch_assoc($result1)) {
						similar_text($rowStud["Abstract"], $rowLec["Expertise"], $perc);
						// round off to nearest digit
						$smallPerc = ceil($perc);					
							echo "<tr><td>".$rowStud['Title']."</td><td>".$rowStud['Category']."</td><td>".$rowLec['Name']."</td><td>".$rowLec['Expertise']."</td><td>".$smallPerc."</td></tr>";
							
					}
					echo "</table><br /><br /><br /><br /><hr />";
				} else {
					echo "0 results";
				}
			?>
		</div>
	</div>



<div id="projectupdate" width="30%">
	<h3><u>UPDATE/CHANGE YOUR PROJECT HERE </u></h3><br />
	<form method="POST" action="studenthome.php">
		<?php include "projectupdate.php";?>

		TITLE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="title"><br /><br />
		CATEGORY:&nbsp;&nbsp;
		  <br /><select name="category">
					<option></option>
					<option>Health</option>
					<option>Technolpoogy</option>
					<option>Agriculture</option>
					<option>Administration</option>
					<option>Finance</option>
				</select><br /><br />
		ABSTRACT:<br /><textarea name="abstract" rows="10" cols="35">  </textarea><br /><br /><br />

		<input type="submit" name="submit" value="UPDATE" >
	</form>
</div>

<div style="text-align:center;">
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

		<input type="submit" name="submit2" value="REGISTER" >


		</form>
		</div>


		';
		}	

	?>

	<div id="social">
		<u>FOLLWO US</u><br />
		<a href="#"  >Twitter</a><br />
		<a href="#" >Facebook</a><br />
		<a href="#" >Instagram</a><br />
		<a href="#">google+<br />
		<a href="#">youtube</a><br />
		<a href="#">hotmail</a><br />
	</div>

	<div>
		<p>Copyright &#169 2020</p>
	</div>

<body>
</html>