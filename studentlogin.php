<?php
	session_start();
?>
<html>
    <head> 
		<title> STUDENT LOGIN </Title> 
		<link rel="stylesheet" type="text/css" href="maincss.css">
	</head>

	<style>
		

	</style>
    <body>
		<?php 
			include "menubar.php";
		?>

		<div class="studentloginform">
			<form method="POST" action="studentlogin-inc.php" enctype="multipart/form-data" class="form">
				<h3 style="margin-bottom: 10px;"><u>LOGIN</u></h3>
				REGISTRATION NO.:<br /><input type="text" name="regno" value="" placeholder="Registration No." required><BR/><br />
				PASSWORD:<br /><input type="password" name="pass1" value="" placeholder="Password" required><BR/>
				<br />

				<?php
					if(isset($_GET["error"])){
						if($_GET["error"]=="wronglogin"){
							echo "<p><font color = red>User not found <font></p>";
						
						}
						else if($_GET["error"]=="wrongpassword"){
							echo "<p><font color = red>Incorrect password <font></p>";
						
					}
					}
				?>

				<br />
				<input type="submit" name="login_submit" style="margin-top: 1rem;" value="LOGIN">
				<a class="new" href="streg.php">New Student </a>
			</form>
		</div>
		
		<div class="footer" style="">
			<p>Copyright &copy; 2020</p>
		</div>
	</body>
</html>