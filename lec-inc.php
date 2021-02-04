<?php
$LecNo ="";
$name ="";
$email ="";
$expertise ="";


$errors = array();

require 'connection.php';
if(isset($_POST['register_submit'])){
	$LecNo = mysqli_real_escape_string($conn, $_POST['lecno']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$expertise = mysqli_real_escape_string($conn, $_POST['expertise']);
	$password = mysqli_real_escape_string($conn, $_POST['pass1']);
	$password_confirm = mysqli_real_escape_string($conn, $_POST['pass2']);
	// Form validation
	if(empty($LecNo)){
		array_push($errors, "Lecturer is required");
	}
	if(empty($name)){
		array_push($errors, "Name is required");
	}
	if(empty($email)){
		array_push($errors, "email is required");
	}
	if(empty($expertise)){
		array_push($errors, "Expertise is required");
	}
	if(empty($password)){
		array_push($errors, "Password is required");
	}
	if(empty($password_confirm)){
		array_push($errors, "Password is required");
	}
	if ($password != $password_confirm){
		array_push($array, "The two passwords do not match");
	}

	// availability of similar records
	$user = "SELECT * FROM lecturer WHERE LecNo='$LecNo' OR email='$email' LIMIT 1";
	$results = mysqli_query($conn, $user);
	$output = mysqli_fetch_assoc($results);
	if($output){
		if($output['LecNo'] === $LecNo){
			array_push($errors, "Lecturer already exists");
		}
		if ($output['email'] == $email){
			array_push($errors, "Email already exists");
		}
	}
	if(count($errors)==0){
		$password_hash = password_hash($password, PASSWORD_BCRYPT);

		$insert = "INSERT INTO lecturer (LecNo, name, email, expertise, password) 
  			  VALUES('$LecNo', '$name', '$email', '$expertise', $password')";
  		mysqli_query($conn, $insert);
  		$_SESSION['Lecno'] = $lecNo;
  		$_SESSION['success'] = "You have successfully Registered";
  		header('leclogin.php');
	}
}
?>