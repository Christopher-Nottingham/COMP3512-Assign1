<?php 

require_once('config.inc.php');
require_once('helperfiles.php');



?>


<html>
    <head>
<title>Home Page</title>
<style>

  </style>

    </head>
    
<link rel="stylesheet" href="../styling_files/home_page.css">
    <body>
    <header><nav>
        <a href="./Home.php">Home</a>
        <a href="./SingleSong.php">Single Song</a>
        <a href="./Favorites.php">Favorites</a>    
        <a href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a href="./Search.php">Search</a>    
    </nav></header>
       <!-- // <header> <center>header</center></header> -->
        <div class="wrapper">
 <div class="item"><a href="./SingleSong.php">Top Genres</a></div>
 <?php
 getTopGenres();
 ?>
<div class="item"><a href="./SingleSong.php">Top Artist</a></div>
<?php
 getTopArtist();
 ?>
<div class="item"><a href="./SingleSong.php">Most Popular Songs</a></div>
<?php
getMostPopularSongs();
?>
<div class="item"><a href="./SingleSong.php">One Hit Wonders Songs</a></div>
<?php
getOneHitWondersSongs();
?>
<div class="item"><a href="./SingleSong.php">Longest Acoustic Songs</a></div>
<?php
getLongestAcousticSongs();
?>
<div class="item"><a href="./SingleSong.php">At The Club</a></div>
<?php
getAtTheClub();
?>
<div class="item"><a href="./SingleSong.php">Running Songs</a></div>
<?php
getRunningSongs();
?>
<div class="item"><a href="./SingleSong.php">Studying</a></div>
<?php
getStudyingSongs();
?>
  
</div>
    <footer>WRITE A DESCRIPTION ABOUT THE ASSINGMENT OUR NAMES AND THE GIT LINK</footer>
    </body>
</html>