<html>
<head>
	<link rel="stylesheet" type="text/css" href="maincss.css">
	<script language="JavaScript1.1">

		var slideimages=new Array()
		var slidelinks=new Array()
		function slideshowimages(){
			for (i=0;i<slideshowimages.arguments.length;i++){
				slideimages[i]=new Image()
				slideimages[i].src=slideshowimages.arguments[i]
			}
		}

		function slideshowlinks(){
			for (i=0;i<slideshowlinks.arguments.length;i++)
				slidelinks[i]=slideshowlinks.arguments[i]
		}

		function gotoshow(){
			if (!window.winslide||winslide.closed)
				winslide=window.open(slidelinks[whichlink])
			else
				winslide.location=slidelinks[whichlink]
				winslide.focus()
		}

	</script>

	<title>SPMS-HOME</title>

	<style>
		.wrapper {
			display: flex;
			justify: space-between;
		}
		.quickLinks,
		.social {
			width: 200px;
			background-color: #348017;
			height: 100%;
			padding: 4rem 1rem;
		}

		.link {
			text-decoration: none;
			color: black;
			display: block;
			margin: 1rem auto;
		}

		.image {
			width: 60%;
			height: 400px;
		}
	</style>
	</head>


	<body>
		<?php include "menubar.php";?>

		<div class="wrapper">
			<div class="quickLinks">
				<h3 style="margin-bottom: 2rem"><u>QUICK LINKS</u></h3>
				<a href="index.php" class="current" >HOME</a>
				<a class="link" href="PROJECTS.php" >PROJECTS</a>
				<a class="link" href="studenthome.php" >STUDENTS' PORTAL</a>
				<a class="link" href="lecturerhome.php">LECTURES' PORTAL</a>
				<a class="link" href="#">ABOUT US</a>
				<a class="link" href="#">OUR CONTACTS</a>
			</div>

			<div class="image">
				<a href="javascript:gotoshow()" style="width: 50%;">
					<img src="homeimages/1.jpg" name="slide" border=0 style="width: 100%; height: 100%;">
				</a>
			</div>
			<script>

				slideshowimages("homeimages/1.jpg","homeimages/2.jpg","homeimages/3.jpg", "homeimages/4.jpg","homeimages/5.png")
				var slideshowspeed=3000

				var whichlink=0
				var whichimage=0
				function slideit(){
				if (!document.images)
				return
				document.images.slide.src=slideimages[whichimage].src
				whichlink=whichimage
				if (whichimage<slideimages.length-1)
				whichimage++
				else
				whichimage=0
				setTimeout("slideit()",slideshowspeed)
				}
				slideit()

			</script>
			
			<div class="social">
				<u>FOLLOW US</u>
				<a class="link" href="#">Twitter</a>
				<a class="link" href="#" >Facebook</a>
				<a class="link" href="#" >Instagram</a>
				<a class="link" href="#">google+<br />
				<a class="link" href="#">youtube</a>
				<a class="link" href="#">hotmail</a>
				<a class="link" href="PROJECTS.PHP">@SPMS.COM</a>
			</div>
		</div>
		
		<div class="footer">
			Copyright &#169 2018 Lewis, Charles and Vilma
		</div>
	</body>
</html>