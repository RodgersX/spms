<html>
<head><style type="text/css">
#Btabe{  border:0px solid#ACB8F0; width:100%;  }

#td1{  border:0px solid#ACB8F0; width:15%; }

#td3{ border:0px solid#ACB8F0; width:15%;}
#title{ border:3px solid#ACB8F0; text-align:center; height:50px; background-color:green; color:white;font:26px arial;}

#menu1{ border:3px solid#ACB8F0; text-align:center; height:50px; background-color:green; color:white;font:26px arial;}

	a{color:#00000F;  text-decoration:none;}
	a.hover{text-decoration:underline;}
</style>
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
</head>


<body>
<?php include "menubar.php";?>

<div id="topimage">

</div>
<table id="Btabe" >
<tr>
<td id="td1" style="vertical-align:bottom"><div id="quicklinks" >
<h3><u>QUICK LINKS</u></h3>
<a href="index.php" class="current" >HOME</a><br /><br />
<a href="PROJECTS.php" >PROJECTS</a><br /><br />
<a href="studenthome.php" >STUDENTS' PORTAL</a><br /><br />
<a href="lecturerhome.php">LECTURES' PORTAL</a><br /><br />
<a href="#">ABOUT US</a><br /><br />
<a href="#">OUR CONTACTS</a><br />
</div></td>
<td id="td2">
<a href="javascript:gotoshow()"><img src="homeimages/1.jpg" name="slide" border=0 width=100% height=490></a>
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

</td>

<td id="td3" style="vertical-align:bottom">
<div id="social">
<u>FOLLOW US</u><br /><br />
<a href="#"  >Twitter</a><br /><br />
<a href="#" >Facebook</a><br /><br />
<a href="#" >Instagram</a><br /><br />
<a href="#">google+<br /><br />
<a href="#">youtube</a><br /><br />
<a href="#">hotmail</a><br /><br />
<a href="PROJECTS.PHP">@SPMS.COM</a><br />

</div>
</td>
</tr>

<tr>
<td colspan="3" style="background:#348017; text-align:center;" >Copyright &#169 2018 Lewis, Charles and Vilma</td>
</tr>
</table>

</body>
</html>