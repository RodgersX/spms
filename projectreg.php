<?php
require('connection.php');
//PROJECT REGISTRATION

if(isset($_POST['submit2'])){
	if( empty($_POST['projectid']) || empty($_POST['title']) || empty($_POST['category']) || empty($_POST['abstract'])){
	echo "<br /><font color='red'><b>Fill all the fields to register. </b></font><br />";		
	}else{
		if(!is_numeric($_POST['projectid'])){
		echo "<br /><font color='red'><b>Project id should strictly numeric. </b></font><br />";	
		}else{
			if(is_numeric($_POST['title'])){
			echo "<br /><font color='red'><b>project Title should not contain numeric </b></font><br />";	
			}else{
				
				$regno = $_SESSION['RegNo'];
				
				$projectid = $_POST['projectid'];
				$title = $_POST['title'];
			    $category = $_POST['category'];
				$abstract =  $_POST['abstract'];
				
				$query = "UPDATE `student` SET `ProjectID` = '$projectid', `Title` = '$title', `Category` = '$category', `Abstract` = '$abstract' WHERE `student`.`REGNO` = '$regno'";
			    mysqli_query($conn, $query);
				
				echo "<br /><font color='white'><b>YOU SUCCESSFULLY REGISTERED YOUR PROJECT<BR />LOADING YOUR DETAILS..... </b></font><br />";
				header('refresh:5; url="studenthome.php"');
				
				
				
			}
				
		}
		
	}
	
}


?>