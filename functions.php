<?php
/*function emptyInputSignup($RegNo,$name,$email,$password,$password_confirm){
	$results; 
	if (empty($RegNo)||empty($name)||empty($email)||empty($password)||empty($password_confirm)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}
*/
function RegNoExists($conn, $RegNo){
	$sql = "SELECT * FROM student WHERE RegNo = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: streg.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $RegNo);
	mysqli_stmt_execute($stmt);
	
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		$results = false;
		return $results;
	}
	mysqli_stmt_close($stmt);
}

function emailExists($conn, $email){
	$sql = "SELECT * FROM student WHERE Email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: streg.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		$results = false;
		return $results;
	}
	mysqli_stmt_close($stmt);
}

function invalidemail($email){
	$results; 
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}
/*
function passwordMatch($password,$password_confirm){
	$results; 
	if ($password != $password_confirm){
		$results = false;
	}
	else{
		$results = true;
	}
	return $results;
}*/

function createUser($conn, $RegNo, $name, $email, $password){
	$sql = "INSERT INTO student(RegNo, Name, Email, Password)
			VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: streg.php?error=stmtfailed");
		exit();
	}
	
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "ssss", $RegNo, $name, $email, $hashedpassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	echo "Registration Successful";
	header("refresh:2;url=studentlogin.php");
}

/*function emptyInputLogin($RegNo, $password){
	$results; 
	if (empty($RegNo)||empty($password)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}*/

function loginUser($conn, $RegNo, $password){
	$RegNoExists = RegNoExists($conn, $RegNo);
	
	if($RegNoExists === false) {
		header("location: studentlogin.php?error=wronglogin");
		exit();
	}
	$passwordhashed = $RegNoExists["Password"];

	$pass = password_hash($password, PASSWORD_DEFAULT);

	// test
	// $sql = "SELECT * FROM student WHERE RegNo = '$RegNo' and Password = '$password' ";
	// $result = mysqli_query($conn, $sql);
	// $count = mysqli_num_rows($result);
	// end of test code

	$check_password = password_verify($pass, $passwordhashed);
	
	// TODO: change back to check_password
	if ($check_password = true) {
		session_start();
		$_SESSION["RegNo"] = $RegNoExists["RegNo"];
		$_SESSION["name"] = $RegNoExists["Name"];
		header("location: studenthome.php");
		exit();
	}
	else if ($check_password = false) {
		header("location: studentlogin.php?error=wrongpassword");
		exit();
	}
}