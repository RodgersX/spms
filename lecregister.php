<?php
session_start();

?>
<html>
    <head> <title> LECTURER REGISTRATION </Title> </head>
    <body>
        <p> </p>
        <table Id="lecturersignuptable" border="0">
	<td>

	<div id="lecregform">
	<form method="POST" action="lecregister.php" enctype="multipart/form-data">
	
	<h3><u>SIGN UP</u></h3>
	<?php
	include('errors.php');
	?>
	LECTURER NO.:<br /><input type="text" name="lecno" value="" placeholder="Lecturer No." ><BR/><br />
	NAME:<br /><input type="text" name="name" value="" placeholder="Name" ><br/><br/>
	EMAIL:<br /><input type="email" name="email" value="" placeholder="Email"><br/><br/>
	EXPERTISE:<br /><input type="text" name="expertise" value="" ><BR/><br />
	PASSWORD:<br /><input type="password" name="pass1" value="" ><BR/><br />
	CONFIRM PASSWORD:<br /><input type="password" name="pass2" value="" ><BR/><br />
	

	<br /><input type="submit" name="register_submit" value="SIGN UP">
	</form>
	</div>

	</td>
    </tr>

    <tr>
        <td colspan="3" style="background:#348017;" >Copyright &#169 2020</td>
    </tr>
    </table>
</body>
</html>
<?php

$errors = array();

require('connection.php');
require('errors.php');
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
  		$_SESSION['Lecno'] = $LecNo;
  		$_SESSION['success'] = "You have successfully Registered";
  		header('leclogin.php');
	}
}
?>
