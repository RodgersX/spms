<?php
session_start();

?>
<html>
    <head> 
		<title> LECTURER REGISTRATION </Title> 
		<style>
			#lecregform {
    			background-color: #348017;
    			padding: 1rem 2rem;
    			width: 50%;
    			margin: 2rem auto;
    		}

    		input {
    			padding: 5px;
    			width: 100%;
    		}

    		.button {
    			width: 200px;
    			margin: 0 auto;
    		}
    		.form {
    			width: 90%;
    			margin: auto;
    		}

    		.copyright {
    			background-color: #348017;
    			width: 100%;
    			height: 40px;
    			display: flex;
    			justify-content: center;
    			align-items: center;
    		}
		</style>
	</head>
    <body>
		<?php
			include('menubar.php');
		?>

		<div id="lecregform">
			<form method="POST" action="lecregister-inc.php" enctype="multipart/form-data" class="form">
				<h3><u>SIGN UP</u></h3>
				LECTURER NO.:<br /><input type="text" name="lecno" value="" placeholder="Lecturer No." ><BR/><br />
				NAME:<br /><input type="text" name="name" value="" placeholder="Name" ><br/><br/>
				EMAIL:<br /><input type="email" name="email" value="" placeholder="Email"><br/><br/>
				EXPERTISE:<br /><input type="text" name="expertise" value="" ><BR/><br />
				PASSWORD:<br /><input type="password" name="pass1" value="" ><BR/><br />
				CONFIRM PASSWORD:<br /><input type="password" name="pass2" value="" ><BR/><br />
				
				
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

				<br /><input type="submit" name="register_submit" value="SIGN UP" class="button">
			</form>
		</div>
		<div class="copyright">
			<p>Copyright &copy; 2020</p>
		</div>
	</body>
</html>

