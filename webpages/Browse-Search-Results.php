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
<form action="Browse-Search-Results.php" method="get">

<input type="submit" value="Show All" name="clicked"  >
</form>

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
</table>

    </body>
</html>