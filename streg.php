<?php
	require('connection.php');
	session_start();
?>
<html>
    <head>
		<title> STUDENT REGISTRATION </Title> 
		<link rel="stylesheet" type="text/css" href="maincss.css">

		<script>
			function compare() {
				pass = document.getElementById('password').value;
				confirmPass = document.getElementById('confirmPass').value;
				if(pass.toString() != confirmPass.toString()) {
					alert('Passwords do not match');
				}
			}
		</script>

		<style>

		</style>
	</head>
    <body>
		<?php include "menubar.php";?>

		<div class="studentregform">
			<form method="POST" action="stureg-inc.php" enctype="multipart/form-data" novalidate class="form">
				<h3 style="margin-bottom: 10px;"><u>SIGN UP</u></h3>
				REGISTRATION NO:<input type="text" name="regno" value="" placeholder="Registration No." required ><BR/><br />
				NAME:<input type="text" name="name" value="" placeholder="Name" required><br/><br/>
				EMAIL:<input type="email" name="email" value="" placeholder="Email" required><br/><br/>
				PASSWORD:<input id="password" type="password" name="pass1" value="" placeholder="Password" required ><BR/><br />
				CONFIRM PASSWORD:<br /><input id="confirmPass" type="password" name="pass2" value="" placeholder="Confirm Password" required><BR/><br />
				
				<?php
					if(isset($_GET["error"])){
						if($_GET["error"]=="RegNoAlreadyinUse"){
							echo "<p><font color = red>User already exists in the system<font></p>";
						}
						else if ($_GET["error"]=="EmailAlreadyinUse"){
							echo "<p>Email already exists in the system</p>";
						}
						else if ($_GET["error"]=="invalidemail"){
							echo "<p><font color = red>Please enter a valid email <font></p>";
						}
						else if ($_GET["error"]=="Passwordsdonotmatch"){
							echo "<p>The two passwords do not match</p>";
						}
						else if ($_GET["error"]=="stmtfailed"){
							echo "<p>Something went wrong. Try again </p>";
						}
					}
				?>
				<br /><input type="submit" style="cursor: pointer;" name="register_submit" value="SIGN UP" onclick="compare()">
			</form>
		</div>
	</body>
</html>
