<?php

if(isset($_POST["login_submit"])){
	
	$RegNo = $_POST["regno"];
	$password = $_POST["pass1"];
	
	require_once 'connection.php';
	require_once 'functions.php';
	
	/*if (emptyInputLogin($RegNo, $password) !== false){
		header("location: studentlogin.php?error=emptyInput");
		exit();
		
	}*/
	loginUser($conn, $RegNo, $password);
	
}
else{
	header("location: studentlogin.php?error=emptyInput");
	exit();
}