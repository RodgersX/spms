<?php 

require_once ("connection.php");
$sql = "SELECT * FROM student WHERE Supervisor = '' ";
$result = mysqli_query($conn, $sql);

$supervisor = "SELECT * FROM lecturer";
$result1 = mysqli_query($conn, $supervisor);

if(mysqli_num_rows($result) > 0) {
	//for($x=0; $x<count($row); $x++) {
	//	echo $row["Name"]. "<br>";
	//}
	$rowStud = mysqli_fetch_assoc($result);
	while($rowLec = mysqli_fetch_assoc($result1)) {
			// echo $row["Name"];
			similar_text($rowStud["Abstract"], $rowLec["Expertise"], $perc);
			$smallPerc = ceil($perc);
			if($perc >= 4.00) {
				echo "Project Title: ". $rowStud["Title"]. " Lecturer Name: ". $rowLec["Name"]. " Expertise: ". $rowLec["Expertise"]. " ". $smallPerc. "%". "<br>";
			}
	}
} else {
	echo "0 results";
}


?>