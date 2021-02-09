<?php
	session_start();
?>
<html>
    <head> <title> STUDENT LOGIN </Title> 
	<link rel="stylesheet" type="text/css" href="maincss.css">
	<style type="text/css">
    		#studentloginform {
    			background-color: #348017;
    			padding: 1rem 2rem;
    			width: 40%;
    			margin: 2rem auto;
    		}
    		.newStud {
    			width: 40%;
    			margin: 1rem auto;
    			display: flex;
    			justify-content: flex-start;
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
    			width: 40%;
    			margin: auto;
    		}

    		.copyright {
    			background-color: #348017;
    			width: 100%;
    			position: absolute;
    			bottom: 0;
    			height: 40px;
    			display: flex;
    			justify-content: center;
    			align-items: center;
    		}
    	</style>
	</head>
    <body>
	<?php include "menubar.php";?>

	<div id="studentloginform">
		<form method="POST" action="studentlogin-inc.php" enctype="multipart/form-data" class="form">
			<h3><u>LOGIN</u></h3>
			
			REGISTRATION NO.:<br /><input type="text" name="regno" value="" placeholder="Registration No." required><BR/><br />
			PASSWORD:<br /><input type="password" name="pass1" value="" required><BR/><br />


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
			
			<br /><input type="submit" name="login_submit" value="LOGIN" class="button">
		</form>
	
	</div>
       <div class="newStud">
       		<a href = "streg.php">New Student </a>
       </div>
   
        <div class="copyright">
        	Copyright &#169 2020
        </div>
</body>
</html>