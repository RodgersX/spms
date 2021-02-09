<?php
session_start();
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 if(isset($_POST["submit"]))  
 {  
      if(!empty($_POST["search"]))  
      {  
           $query = str_replace(" ", "+", $_POST["search"]);  
           header("location:projects.php?search=" . $query);  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>PROJECTS</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:80%;">  
                <h3 align="center">Search</h3><br />  
                <form method="post">  
                     <label>Enter Search Criteria</label>  
                     <input type="text" name="search" id ="search" class="form-control input-lg" value="<?php if(isset($_GET["search"])) echo $_GET["search"]; ?>" autocomplete="off"/>  
                     <br />  
                     <input type="submit" name="submit" class="btn btn-info" value="Search" />  
                </form>  
                <br /><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered"> 
                   <?php  
                     if(isset($_GET["search"]))  
                     {  
                          $condition = '';  
                          $query = explode(" ", $_GET["search"]);  
                          foreach($query as $text)  
                          {  
                               $condition = "abstract LIKE '%".mysqli_real_escape_string($connect, $text)."%' OR ";  
                          }  
                          $condition = substr($condition, 0, -4);  
                          $sql_query = "SELECT * FROM student WHERE " . $condition;  
                          $result = mysqli_query($connect, $sql_query);  
                          if(mysqli_num_rows($result)>0)  
                          {  
                               while($row = mysqli_fetch_array($result))

                               {  
                                    echo "<tr><th>TITLE</th><th>CATEGORY</th><th>ABSTRACT</th><th>DONE BY</th><th>CONTACTS</th></tr>";
                                    echo '<tr><td>'.$row["Title"].'</td><td>'.$row["Category"].'</td><td>'.$row["Abstract"].'</td><td>'.$row["Name"].'</td>
                                    <td>'.$row["Email"].'</td></tr>';  
									
							   }  
                          }
						  
                          else  
                          {  
                               echo '<label>Data not Found</label>';  
                          }		  
                     }
?>				 
          
                     </table>
					 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>
 $(document).ready(function(){
	 $('#search').typeahead({
		 source: function(query, result)
		 {
			 $.ajax({
				 url:"fetch.php",
				 method:"POST",
				 data:{query:query},
				 dataType:"json",
				 success:function(data)
				 {
					 result($.map(data, function(item){
						 return item;
					 }));
				 }
			 })
		 }
	 });
 });
 </script>