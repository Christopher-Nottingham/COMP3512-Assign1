<?php 

require_once('config.inc.php');
require_once('helperfiles.php');



?>

<html>
    <head>
<title>Favorites</title>
    </head>
    <body>
    <header><nav>
        <a href="./Home.php">Home</a>
        <a href="./SingleSong.php">Single Song</a>
        <a href="./Favorites.php">Favorites</a>    
        <a href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a href="./Search.php">Search</a>    
    </nav></header>
    </body>
</html>



<input type="button" value="Show All"> 

   <button type="button">remove All</button>
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