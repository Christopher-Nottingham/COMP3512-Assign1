<?php 
require_once('config.inc.php');
require_once('helperfiles.php');
?>

<head>
<title>Single Song</title>
<link rel="stylesheet" href="../styling_files/general_styling.css">
</head>

<body>
   

    <body>
    <header>
        <nav>
        <a href="./Home.php">Home</a>
        <a href="./SingleSong.php">Single Song</a>
        <a href="./Favorites.php">Favorites</a>    
        <a href="./Browse-Search-Results.php">Browse/Search Results</a>
    <a href="./Search.php">Search</a>    
    </nav>
</header>

    <?php

 $song = getArtist_From_Song_ID($_GET['song_id']);

//print_r($song);

    //    $songs = getSongs();

       foreach ($song as $row) {
        echo $row['title']. "<br>";
        echo $row['year']. "<br>";
        echo $row['artist_name']. "<br>";
        echo $row['genre_name']. "<br>"; 
        echo $row['genre_id']. "<br>";
        echo $row['duration']. "<br>";
        echo $row['bpm']. "<br>";
        echo $row['energy']. "<br>";
        echo $row['danceability']. "<br>";
        echo $row['liveness']. "<br>";
        echo $row['valence']. "<br>";
        echo $row['acousticness']. "<br>";
        echo $row['speechiness']. "<br>";
        echo $row['popularity']. "<br>";
         //echo $row['title'] . ", " . $row['energy'] . ", " . $row['bpm'] . ", " . $row['danceablity'] . ", " . $row['liveness'] . ", " . $row['valence'] . ", " . $row['acousticness'] . ", " . $row['speechiness'] . ", " . $row['popularity'] . "<br>";

    //     //. ", " . $row['bpm'] ", " . $row['energy'] . ", " . $row['bpm'] ", " . $row['danceability']  
        } 



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
    </body>
    </html>";
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
    </body>
    </html>";
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
    </body>
    </html>";
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
    </body>
    </html>";
} else {
    echo "No results found.";
}
?>

       
    </body>
</body>