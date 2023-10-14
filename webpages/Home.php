<?php 

require_once('config.inc.php');
require_once('helperfiles.php');



?>


<html>
    <head>
<title>Home Page</title>
<link rel="stylesheet" href="../styling_files/style.css">

    </head>
    

    <body>
    <div class="header"><nav class="navigation">
        <a id="white" href="./Home.php">Home</a>&nbsp;
        <a id="white" href="./SingleSong.php">Single Song</a>&nbsp;
        <a id="white" href="./Favorites.php">Favorites</a>    &nbsp;
        <a id="white" href="./Browse-Search-Results.php">Browse/Search Results</a>&nbsp;
    <a id="white" href="./Search.php">Search</a>    &nbsp;
    <a  id="white" href="./aboutus.php">About Us</a>
    </nav></div>
     
        <div class="wrapper">
    <div class="item" ><a  id="Top Genres" href="./helperfiles.php?action=topgenres">Top Genres</a></div>

    <div class="item"><a id="Top Artist" href="./helperfiles.php?action=topartist">Top Artist</a></div>
  
    <div class="item"><a  id="Most Popular Songs" href="./helperfiles.php?action=popularsongs">Most Popular Songs</a></div>

    <div class="item"><a id="One Hit Wonders Songs"  href="./helperfiles.php?action=onehitwonders">One Hit Wonders Songs</a></div>

<div class="item"><a id="LongestAcousticSongsLink" href="./helperfiles.php?action=longestacoustic">Longest Acoustic Songs</a></div>

<div class="item"><a id="AtTheClubLink" href="./helperfiles.php?action=attheclub">At The Club</a></div>

<div class="item"><a id="RunningSongsLink" href="./helperfiles.php?action=runningsongs">Running Songs</a></div>

    <div class="item"><a id="altText" href="./helperfiles.php?action=studying">Studying</a></div>

</div>
    <?php printFooter();?>
    </body>
</html>