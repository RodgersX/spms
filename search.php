<!DOCTYPE html>
<html lang = "en">
<html>
  <head>
  <meta charset = "utf-8">
    <title>Search Topics</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  </head>
  <body>
  <?php
  include('menubar.php');
  ?>
    
    <div class="container">
      
      <h3 class="center" style="margin-bottom:20px;">Search Trending Topics<i class="material-icons medium hide-on-small-only" id="icons"></i></h3>
      
      <form>
          <div class="input-field">
              <i class="material-icons prefix">public</i>
              <input type="text" id="searchquery">
              <label>Search your topic here......</label>
          </div>
          
          <div class="row">
             <input type="submit" id="searchbtn" class="btn col m2 s12" value="search">
             <input type="reset" id="searchbtn" class="btn col m2 s12 red right" value="clear"  style="margin-top:3px;">&nbsp;
			 <input type=button onClick="location.href='studenthome.php'" value='Back' class = "btn col m2 s12">
          </div>
          
      </form>
      
      <div id="loader" style="display:none;">
        <div class="progress">
          <div class="indeterminate"></div>
        </div>
      </div>
      
      <div class="row">
         <div id="newsResults"></div>
      </div>
     
      


      
   </div>

<script src="jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="iconChanger.js"></script>
<script src="newsapi.js"></script>
  
</body>
</html>