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


       ?>
    </body>
</body>