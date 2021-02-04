<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trending Topics</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 

		$url = 'http://newsapi.org/v2/top-headlines?sources=google-news&apiKey=9d32d6761bf8450ca597a20ba12fdd96';
		$response = file_get_contents($url);
		$NewsData = json_decode($response);
	 ?>
	 <div class = "jumbotron">
	 	<h1> Trending Topics</h1>
	 </div>
	 <div class = "container_fluid">
	 	<?php 
	 		foreach ($NewsData -> articles as $News)
	 		{
	 	?>
	 			
		 <div class= "row NewsGrid"> 
		 	 	<div class = "col-md-3">
		 	 		<img src ="<?php echo $News->urlToImage ?>" alt= "News thumbnail">
		 	 	</div>
		 	 	<div class = "col-md-9">
		 	 		<h2> Title:<?php echo $News->title ?> </h2>
		 	 		<h5> Description: <?php echo $News->description ?></h5>
		 	 		<p> Content: <?php echo $News->content ?> <p>
		 	 		<h6> Author: <?php echo $News->author ?></h6>
		 	 		<h6> Published: <?php echo $News->publishedAt ?></h6>
		 	 		<a href="$News.url" class= "btn">Read more</a>
		 	 		
		 	 	</div>

		 	 </div>
		<?php
	 	}

	 	 ?>
	 	
	 </div>

</body>
</html>