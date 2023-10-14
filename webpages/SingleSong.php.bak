<?php 
require_once('config.inc.php');
require_once('helperfiles.php');
?>

<head>
<title>Single Song</title>
<link rel="stylesheet" href="../styling_files/style.css">
</head>

<body>
   

    <body>
    <div class="header"><nav class="navigation">
        <a id="white" href="./Home.php">Home</a>
        <a id="white" href="./SingleSong.php">Single Song</a>
        <a id="white" href="./Favorites.php">Favorites</a>    
        <a id="white" href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a id="white" href="./Search.php">Search</a>    
    <a  id="white" href="./aboutus.php">About Us</a>
    </nav></div>
</header>

    <?php
if (!empty($_GET)){
 $song = getArtist_From_Song_ID($_GET['song_id']);
} else {
    $song = getArtist_From_Song_ID(1001);
}
 
     
echo "<div class='section'>";
       foreach ($song as $row) {
        
        echo "<center>The searched song: " .$row['title'].", " . $row['artist_name'] .", " . $row['genre_name'] .", " . $row['year'] .", " . gmdate("i:s", $row['duration']) . "</center>";
echo "<br> Analysis Data:";
echo"<ul>";
        echo "<li><b>".$row['title']. "</b> has a bpm is: " .$row['bpm']. "</li>";
        echo "<li><b>".$row['title']. "</b> has a energy factor of: ".$row['energy']. "</li>";
        echo "<li><b>".$row['title']. "</b>  has a danceability factor of: ".$row['danceability']. "</li>";
        echo "<li><b>".$row['title']. "</b>  has a liveness factor of: ".$row['liveness']. "</li>";
        echo "<li><b>".$row['title']. "</b>  has a valence factor of: ".$row['valence']. "</li>";
        echo "<li><b>".$row['title']. "</b>  has a acousticness factor of: ".$row['acousticness']. "</li>";
        echo "<li><b>".$row['title']. "</b>  has a speechiness factor of: ".$row['speechiness']. "</li>";
        echo "<li><b>".$row['title']. "</b>  has a populatriy factor of: ".$row['popularity']. "</li>";
echo "</ul>";
        } 

echo "</div>";
printFooter();

// Start the session to access the session variable
session_start();

if (isset($_SESSION['top_artists'])) {
    $artists = $_SESSION['top_artists'];
    echo "<h2>Top Artists</h2>";
    echo "<table>";
    echo "<tr><th>Artist ID</th><th>Artist Name</th><th>Song Count</th></tr>";
    foreach ($artists as $artist) {
        echo "<tr><td>" . $artist['artist_id'] . "</td><td>" . $artist['artist_name'] . "</td><td>" . $artist['song_count'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}


// Start the session to access the session variable
session_start();

if (isset($_SESSION['longest_acoustic_songs'])) {
    $songs = $_SESSION['longest_acoustic_songs'];
    echo "<h2>Longest Acoustic Songs</h2>";
    echo "<ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No results found.";
}

// Start the session to access the session variable
session_start();

if (isset($_SESSION['at_the_club_songs'])) {
    $songs = $_SESSION['at_the_club_songs'];
    echo "<h2>Songs for 'At The Club'</h2>";
    echo "<ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No results found.";
}

// Start the session to access the session variable
session_start();

if (isset($_SESSION['running_songs'])) {
    $songs = $_SESSION['running_songs'];
    echo "<h2>Running Songs</h2>";
    echo "<ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No results found.";
}


// Start the session to access the session variable
session_start();

if (isset($_SESSION['studying_songs'])) {
    $songs = $_SESSION['studying_songs'];
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Studying Songs</title>
    </head>
    <body>
        <h2>Studying Songs</h2>
        <ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>
    </body>";
    
   echo "</html>";
} else {
    echo "No results found.";
}



// Start the session to access the session variable
session_start();

if (isset($_SESSION['top_genres'])) {
    $genres = $_SESSION['top_genres'];
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Top Genres</title>
    </head>
    <body>
        <h2>Top Genres</h2>
        <ul>";
    foreach ($genres as $genre) {
        echo "<li>" . $genre['genre_name'] . " (Songs: " . $genre['song_count'] . ")</li>";
    }
    echo "</ul>
    </body>";
  
   echo "</html>";
} else {
    echo "No results found.";

}



// Start the session to access the session variable
session_start();

if (isset($_SESSION['popular_artists'])) {
    $popularArtists = $_SESSION['popular_artists'];
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Most Popular Songs</title>
    </head>
    <body>
        <h2>Most Popular Songs</h2>
        <ul>";
    foreach ($popularArtists as $artist) {
        echo "<li>" . $artist['artist_name'] . " (Songs: " . $artist['song_count'] . ")</li>";
    }
    echo "</ul>
    </body>";
    printFooter();
   echo "</html>";
} else {
    echo "No results found.";

}



// Start the session to access the session variable
session_start();

if (isset($_SESSION['one_hit_wonders'])) {
    $oneHitWonders = $_SESSION['one_hit_wonders'];
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>One Hit Wonders Songs</title>
    </head>
    <body>
        <h2>One Hit Wonders Songs</h2>
        <ul>";
    foreach ($oneHitWonders as $song) {
        echo "<li>" . $song['title'] . " by " . $song['artist_name'] . " (Popularity: " . $song['popularity'] . ")</li>";
    }
    echo "</ul>
    </body>";

   echo "</html>";
} else {
    echo "No results found.";

}
?>
