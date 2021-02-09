<!DOCTYPE html>

<html>

<head>
	<title>Trending Topics</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<style type="text/css">
		#loader {
			height: 100vh;
			align-items: center;
			display: flex;
			justify-content: center;

		}

		.progress {
			display: none;
		}

		.errorMsg {
			font-size: 34px;
			height: 100vh;
			align-items: center;
			display: flex;
			justify-content: center;
		}
	</style>
</head>

<body>
<?php
include('menubar.php');
?>
	<div class="navbar-fixed">
		<nav class="teal">
			<div class="nav-wrapper">
				<div class="container">
					<a href="#" class="brand-logo">Trending Topics</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li class="active"><a href="news.php">News</a></li>
						<li class="active"><a href="studenthome.php">Back</a></li>
						
					</ul>
				</div>

			</div>
		</nav>
	</div>


	<div class="container">
		
		<div class="row">
			<div id="newsResults"></div>
		</div>

		<div id="loader">
			<div class="progress">
				<div class="indeterminate"></div>
			</div>
		</div>

	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/app.js"></script>
</body>

</html>