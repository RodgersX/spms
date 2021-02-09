
<?php
require("connection.php");
if(isset($_POST['submit'])){
	if(empty($_POST['title']) || empty($_POST['category']) || empty($_POST['abstract'])){
		echo "<br /><font color='red'>Fill all the fields to update </font><br />";
	}else {
		if(is_numeric($_POST['title'])){
		echo "<br /><font color='red'>Title cannot contain numeric </font><br />";	
		}else{
			$regno = $_SESSION['RegNo'];
			$query = " SELECT * FROM student WHERE RegNo ='$regno' ";
			$results = mysqli_query($conn, $query) or die (mysqli_error());
			$project = mysqli_fetch_array($results);
			
			if(isset($project['ProjectID'])){				
				//updating student table			
			$title = $_POST['title'];
			$category = $_POST['category'];
			$abstract =  $_POST['abstract'];
			
			$query = "UPDATE `test`.`student` SET `Title` = '$title', `Category` = '$category', `Abstract` = '$abstract' WHERE `student`.`RegNo` = '$regno'";
			mysqli_query($conn, $query);
			
			header("location:studenthome.php");
			}else{
				echo "<br /><font color='red'>NO PROJECT REGISTED UNDER YOUR NAME<BR />PLEASE REGISTER FIRST.. </font><br />";
			}
			
			
		}		
	}	
}




?>