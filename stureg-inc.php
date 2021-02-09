<?php
	
	if (isset($_POST['register_submit']))
	{		
		// loading the variables 
		$RegNo = $_POST['regno'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['pass1'];
		$password_confirm = $_POST['pass2'];
		
		require_once 'connection.php';
		require_once 'functions.php';
		
		/*if (emptyInputSignup($RegNo, $name, $email, $password, $password_confirm) !== false){
			header("location: streg.php?error=emptyInput");
			exit();
			
		}*/
		if (RegNoExists($conn, $RegNo) !== false){
			header("location: streg.php?error=RegNoAlreadyinUse");
			exit();
			
		}
		if (emailExists($conn, $email) !== false){
			header("location: streg.php?error=EmailAlreadyinUse");
			exit();
			
		}
		if (invalidemail($email) !== false){
			header("location: streg.php?error=invalidemail");
			exit();
			
		}
		/*if (passwordMatch($password,$password_confirm) !== false){
			header("location: streg.php?error=Passwordsdonotmatch");
			exit();*/
		if ($password == $password_confirm) {
			header("location: streg.php?error=Passwordsdonotmatch");
			exit();
		
			
		}
		
		createUser($conn, $RegNo, $name, $email, $password);
		
	}
	else{
		header("location: streg.php");
		exit();
	}
?>