<?php
	
	if (isset($_POST['register_submit']))
	{		
		// loading the variables 
		$LecNo = $_POST['lecno'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$expertise = $_POST['expertise'];
		$password = $_POST['pass1'];
		$password_confirm = $_POST['pass2'];
		
		require_once 'connection.php';
		require_once 'lec-inc.php';
		
		/*if (emptyInputSignup($RegNo, $name, $email, $password, $password_confirm) !== false){
			header("location: streg.php?error=emptyInput");
			exit();
			
		}*/
		if (LecNoExists($conn, $LecNo) !== false){
			header("location: lecregister.php?error=LecNoAlreadyinUse");
			exit();
			
		}
		if (emailExists($conn, $email) !== false){
			header("location: lecregister.php?error=EmailAlreadyinUse");
			exit();
			
		}
		if (invalidemail($email) !== false){
			header("location: lecregister.php?error=invalidemail");
			exit();
			
		}
		/*if (passwordMatch($password,$password_confirm) !== false){
			header("location: streg.php?error=Passwordsdonotmatch");
			exit();*/
		if ($password == $password_confirm) {
			header("location: lecregister.php?error=Passwordsdonotmatch");
			exit();
		
			
		}
		
		createUser($conn, $LecNo, $name, $email, $expertise, $password);
		
	}
	else{
		header("location: lecregister.php");
		exit();
	}
?>