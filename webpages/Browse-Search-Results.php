<?php
require_once('config.inc.php');
require_once('helperfiles.php');
?>
<html>
    <head>
<title>Browse/Search Results Page</title>
    </head>

    <body>
    <header><nav>
        <a href="./Home.php">Home</a>
        <a href="./SingleSong.php">Single Song</a>
        <a href="./Favorites.php">Favorites</a>    
        <a href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a href="./Search.php">Search</a>    
    </nav>
</header>
<form action="Search.php" method="get">

    <button type="button" onclick="location.href='SingleSong.php?song_id='">dsadsadsa</button>

<input type="search" name="ShowAll" id="ShowAll">
<input type="submit" value="Submit">
</form>

 <!-- <input type="button" value="Show All"> --> 
    <!-- <button type="button">Show All</button></form> -->
<table>
    <tr>
        <th>Title</th>
        <th>Artist Name</th>
        <th>Year</th>
        <th>Genere Name</th>
        <th>Popularity Score</th>
        <th>Add to Favorites</th>
        <th>View</th>
    </tr>
    <tbody>
        <?php
        getSongBrowseSearchResults();
        ?>
    </tbody>
   
    <!-- <button type="submit"></button> -->
<!-- </table> -->

    </body>
</html>