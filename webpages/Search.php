<?php
require_once "config.inc.php";
require_once "helperfiles.php";
?>
<html>
    <head>
      <title>Search Page</title>
      <style>
        
      </style>
    </head>
    <body>
    <header><nav>
        <a href="./Home.php">Home</a>
        <a href="./SingleSong.php">Single Song</a>
        <a href="./Favorites.php">Favorites</a>    
        <a href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a href="./Search.php">Search</a>    
    </nav></header>
    
    
    <form action="./Browse-Search-Results.php" method="get">



    <fieldset>  
        <legend>Basic Song Search</legend>  
        <input type="radio" id = "title" name="search_type" value="title">Title</input>
        <input type="text" name="title" id="title"></input>


        <input type="radio" id = "artist" name="search_type" value="artist"> Artist </input>
        
        <select name="artist" id="artist"> 
            <option value="">Select an Option</option>
            <?php
            $listOfArtists = getArtist();
            foreach ($listOfArtists as $row) {
                echo "<option value='" .
                    $row["artist_name"] .
                    "'>" .
                    $row["artist_name"] .
                    "</option>";
            }
            ?>  </select>
        <input type="radio" id = "genre" name="search_type" value="Genre">Genre</input>
       <select name="genre" >
        <option value="">Select an Option</option>
       <?php
        
        $listOfGenres = getGenre();
        foreach ($listOfGenres as $row){
            echo "<option value='" .
                        $row["genre_name"] .
                        "'>" .
                        $row["genre_name"] .
                        "</option>";
        }
        ?> </select>
        
        
        
        
        
        
       
        <input type="radio" name="search_type" value="Year">Year</input>
        
        <input type="radio" id  = "year_less" name="year_type" value="year_less">Less</input>
        <input type="text" name="year_less" id="year_less"> </input>
        <input type="radio" id = "year_greater" name="year_type" value="year_greater">Greater</input>
        <input type="text" name="year_greater" id="year_greater"></input>

 <!-- <input type="text" name="" id="">




<input type="radio" id="title" name="search" value="title">Title</input>

<input type="text" name="title" id="title"> </input>
<br>
  <input type="radio" id="artist" name="search" value="artist">Artist</input>
 <label for="artistName"></label> -->
<!-- <select name="artistName" id="artist">
  // 
//    $listOfArtists = getArtist();
//    foreach ($listOfArtists as $row) {
//        echo "<option value='" .
//            $row["artist_name"] .
//            "'>" .
//            $row["artist_name"] .
//            "</option>";
//    }
//    ?> </select>
   <br> -->

<!-- <input type = "radio" id="year" name = "search" value ="year">Year</input>

<input type = "radio" id="year" name = "year" value ="year_less">Less</input>

<label type="text" for="year_less"></label>

<input type="text" name="year" id="year_greater"> Greater </input>

<label type="text" for="year_greater" name  = "year_greater" id = "year_greater" ></label> -->


<!-- <input type = "radio" id="year" name = "search" value ="Greater"> Less </input> -->
<!-- <input type="text" name="g" id="">  </input> -->
<!-- <br>
  <input type="radio" id="genere" name="search" value="genereChosen"> Genere </input>
<label for="genere"></label>
<select name="genere" id="genere">

//    $listOfGeneres = getGenere();
//    foreach ($listOfGeneres as $row) {
//        echo "<option value='" .
//            $row["genre_name"] .
//            "'>" .
//            $row["genre_name"] .
//            "</option>";
//    }
   ?> -->
 <!-- </select>  -->

<br>
<input type="submit" value="Search">


<input type="reset" value="Clear">

    <!-- <input type="radio" value="title">
        <input type="text" name="title" id="title">
        <input type="text" name="artist" id="artist" >
        <input type="text" name="genere"> -->
        <!-- <input type="search" name="search" id="search"> -->
        

        <fieldset>
    </form>


    </body>
</html>