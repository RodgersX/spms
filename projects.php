<html>
<head>
<title>PROJECTS</title>
<link rel="stylesheet" type="text/css" href="maincss.css">
</head>
<body>
<?php include "menubar.php";?>

<table Id="projectstable" border="0">
<tr><td colspan="3"><img src="images/project.png"  ></td></tr>


<tr>
<td width="200px">
<div id="quicklinks" >
<h3><u>QUICK LINKS</u></h3><br />
<a href="menubar.php" class="current" >HOME</a><br />
<a href="projects.php" >PROJECTS</a><br />
<a href="studenthome.php" >STUDENTS' PORTAL</a><br />
<a href="lecturerlogin.php">LECTURES' PORTAL</a><br />
<a href="#">ABOUT US</a><br />
<a href="#">OUR CONTACTS</a><br />
</div>
</td>

<td>
 
<?php
include('projectsearch.php');/*
require("connection.php");
//getting data from current projects table
$query = "SELECT * FROM student WHERE Title !='' ";
$results = mysqli_query($conn,$query);
echo "<h1>PROJECTS CURRENTLY IN PROGRESS</h1>";
echo '<table border="1"  style="text-align:center;background-color:pink">';
echo "<tr><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th><th>DONE BY</th><th>CONTACTS</th></tr>";
while($project = mysqli_fetch_array($results)){
echo "<tr><td>".$project['Title']."</td><td>".$project['Category']."</td><td>".$project['Abstract']."</td><td>".$project['Name']."</td><td>".$project['Email']."</td></tr>";
}
echo "</table><br /><br /><br /><br /><hr />";	


//getting data from pastprojects table

$query = "SELECT * FROM students WHERE SCORE !='' ";
$results = mysqli_query($conn,$query) or die ();
echo "<h1>PAST PROJECTS</h1>";
echo '<table border="1"  style="text-align:center;background-color:pink">';
echo "<tr><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th><th>SCORE</th><th>DONE BY</th><th>STUDENT'S CONTACTS</th><th>SUPERVISED BY</th><th>SUPERVISOR'S CONTACTS</th></tr>";
while($project = mysql_fetch_array($results)){
echo "<tr><td>".$project['TITLE']."</td><td>".$project['CATEGORY']."</td><td>".$project['ABSTRACT']."</td><td>".$project['SCORE']."</td><td>".$project['NAME']."</td><td>".$project['CONTACTS']."</td><td>".$project['SUPERVISOR']."</td><td>".$project['SUPERVISOR_CONTACTS']."</td></tr>";
}
echo "</table><br /><br /><br /><hr />";










*/?>
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

</tr>


<tr><td colspan="3" style="background:#348017;" >Copyright &#169 2018 </td></tr>


</table>

</body>

</html>