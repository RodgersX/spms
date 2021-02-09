<?php
/*function emptyInputSignup($LecNo,$name,$email,$password,$password_confirm){
	$results; 
	if (empty($LecNo)||empty($name)||empty($email)||empty($password)||empty($password_confirm)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}
*/
function LecNoExists($conn, $LecNo){
	$sql = "SELECT * FROM lecturer WHERE LecNo = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: lecregister.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $LecNo);
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
	$sql = "SELECT * FROM lecturer WHERE Email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: lecregister.php?error=stmtfailed");
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

function createUser($conn, $LecNo, $name, $email, $expertise, $password){
	$sql = "INSERT INTO lecturer(LecNo, Name, Email, Expertise, Password)
			VALUES (?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: lecregister.php?error=stmtfailed");
		exit();
	}
	
	
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "sssss", $LecNo, $name, $email, $expertise, $hashedpassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	echo "Registration Successful";
	header("refresh:3;url=leclogin.php");
	
}



/*function emptyInputLogin($LecNo, $password){
	$results; 
	if (empty($LecNo)||empty($password)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}*/

function loginUser($conn, $LecNo, $password){
	$LecNoExists = LecNoExists($conn, $LecNo);
	
	if($LecNoExists === false){
		header("location: leclogin.php?error=wronglogin");
		exit();
	}
	$passwordhashed = $LecNoExists["Password"];
	

	$pass = password_hash($password, PASSWORD_DEFAULT);
	$check_password = password_verify($pass, $passwordhashed);
	
	if ($check_password === false){
		session_start();
		$_SESSION["LecNo"] = $LecNoExists["LecNo"];
		$_SESSION["name"] = $LecNoExists["Name"];
		header("location: lecturerhome.php");
		exit();
	}
	else if ($check_password === true){
		header("location: leclogin.php?error=wrongpassword");
		
		exit();
	}
}