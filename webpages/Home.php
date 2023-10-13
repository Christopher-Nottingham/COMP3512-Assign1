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
        <a id="white" href="./Home.php">Home</a>
        <a id="white" href="./SingleSong.php">Single Song</a>
        <a id="white" href="./Favorites.php">Favorites</a>    
        <a id="white" href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a id="white" href="./Search.php">Search</a>    
    <a  id="white" href="./aboutus.php">About Us</a>
    </nav></div>
     
        <div class="wrapper">
    <div class="item" ><a  id="altText" href="./SecondPage.php?action=topgenres">Top Genres</a></div>

  <div class="item"><a id="altText"  href="./SecondPage.php">Top Artist</a></div>
  
    <div class="item"><a  id="altText" href="./SecondPage.php?action=popularsongs">Most Popular Songs</a></div>

    <div class="item"><a id="altText"  href="./SecondPage.php?action=onehitwonders">One Hit Wonders Songs</a></div>

    <div class="item"><a id="altText"  href="./SecondPage.php">Longest Acoustic Songs</a></div>

    <div class="item"><a id="altText"  href="./SecondPage.php">At The Club</a></div>

    <div class="item"><a id="altText"  href="./SecondPage.php">Running Songs</a></div>

    <div class="item"><a id="altText" href="./SecondPage.php?action=studying">Studying</a></div>

</div>
    <?php printFooter();?>
    </body>
</html>