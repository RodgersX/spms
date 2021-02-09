<?php

if(isset($_POST["login_submit"])){
	
	$LecNo = $_POST["lecno"];
	$password = $_POST["pass1"];
	
	require_once 'connection.php';
	require_once 'lec-inc.php';
	
	/*if (emptyInputLogin($LecNo, $password) !== false){
		header("location: studentlogin.php?error=emptyInput");
		exit();
		
	}*/
	loginUser($conn, $LecNo, $password);
	
}
else{
	header("location: leclogin.php?error=emptyInput");
	exit();
}