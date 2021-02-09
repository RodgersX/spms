<?php
session_start(); 
	include('connection.php');
	$query = "SELECT * FROM lecturer";
	$results = mysqli_query($conn, $query); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<?php 
		require('menubar.php');
		require('functions.php');
	?>

	<form name="select_lec" action="select.php" method="POST">
		<label>Select a Lecturer:</label>
		<select name='supervisor'>
			<?php
				while($row = mysqli_fetch_array($results)):;?>
			<option><?php echo $row[0]; ?></option>
		<?php endwhile; ?>
			
		</select></br>
	</br>
		<input type="submit" name="select_supervisor" value="SUBMIT">

	</form>


</body>
</html>
<?php

if(isset($_POST['select_supervisor'])){
	if(empty($_POST['supervisor'])){
		echo "Select the Supervisor!";
	}
	else{

		//$_SESSION["RegNo"] = $RegNoExists["RegNo"];
		$regno = $_SESSION['RegNo'];

		$choice = $_POST['supervisor'];

		$query = "UPDATE `student` SET `Supervisor` = '$choice' WHERE `RegNo`= '$regno'";
		mysqli_query($conn, $query);
	} 
	if ($conn->query($query) === TRUE) {
		$supervisor = "SELECT * FROM lecturer WHERE LecNo =$choice";
			$result1 = mysqli_query($conn, $supervisor);
			$rowLec = mysqli_fetch_assoc($result1);
 	 echo "Lecturer Selected: :".$rowLec['Name'];
	header('refresh:6; url="studenthome.php"');
} else {
  echo "Error updating record: " . $conn->error;
}

	
	
}
?>