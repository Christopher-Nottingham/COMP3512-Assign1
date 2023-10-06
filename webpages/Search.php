<?php 
require_once('config.inc.php');
require_once('helperfiles.php');

?>
<html>
    <head>
      <title>Search Page</title>
    </head>
    <body>
    
    
    <form action="/Browse-Search-Results.php" method="get">


    
    
<input type="radio" id="title" name="search" value="title">
  <label for="title">Title</label>
<input type="text" name="title" id="title">
<br>
  <input type="radio" id="artist" name="search" value="artist">
 
 <label for="artist">Artist</label>
<select id="artist">
   <?php 
   $listOfArtists = getArtist(); 
   foreach ($listOfArtists as $row){
    echo "<option value='".$row['artist_name']."'>".$row['artist_name']."</option>";
   }
   ?>
  <input type="radio" id="genere" name="search" value="genere">
<br>  
<label for="genere">Genere</label>
<select  id="genere">
   <?php 
   $listOfGeneres = getGenere(); 
   foreach ($listOfGeneres as $row){
    echo "<option value='".$row['genre_name']."'>".$row['genre_name']."</option>";
   }
   ?>
</select>
<br>
<input type="submit" value="Submit">


<input type="reset" value="Clear">

    <!-- <input type="radio" value="title">
        <input type="text" name="title" id="title">
        <input type="text" name="artist" id="artist" >
        <input type="text" name="genere"> -->
        <!-- <input type="search" name="search" id="search"> -->
        


    </form>


    </body>
</html>