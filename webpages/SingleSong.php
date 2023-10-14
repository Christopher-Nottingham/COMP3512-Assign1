<?php 
require_once('config.inc.php');
require_once('helperfiles.php');

?>

<head>
<title>Single Song</title>
<link rel="stylesheet" href="../styling_files/style.css">
</head>

<body>
 
   <header>
     <div class="header"><nav class="navigation">
        <a id="white" href="./Home.php">Home</a>&nbsp;
        <a id="white" href="./SingleSong.php">Single Song</a>&nbsp;
        <a id="white" href="./Favorites.php">Favorites</a>    &nbsp;
        <a id="white" href="./Browse-Search-Results.php">Browse/Search Results</a>&nbsp;
    <a id="white" href="./Search.php">Search</a>    &nbsp;
    <a  id="white" href="./aboutus.php">About Us</a>
    </nav></div>
</header>

    <?php



$str = $_SERVER['QUERY_STRING'];
$newStr = substr($str,7);









if ( $newStr =='topartist') {
    // print_r(getTopArtist());
    $artists = getTopArtist();
    print_r($artists);
    echo "<h2>Top Artists</h2>";
    echo "<table>";
    echo "<tr><th>Artist ID</th><th>Artist Name</th><th>Song Count</th></tr>";
    foreach ($artists as $artist) {
        echo "<tr><td>" . $artist['artist_id'] . "</td><td>" . $artist['artist_name'] . "</td><td>" . $artist['song_count'] . "</td></tr>";
    }
    echo "</table>";
} elseif ($newStr =='longestacoustic') {

    $songs = getLongestAcousticSongs();
    echo "<h2>Longest Acoustic Songs</h2>";
    echo "<ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>";
} elseif ($newStr == 'attheclub') {
    $songs = getAtTheClubSongs();
    echo "<h2>Songs for 'At The Club'</h2>";
    echo "<ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>";
} 
elseif ($newStr == 'runningsongs') {
    $songs = getRunningSongs();
    echo "<h2>Running Songs</h2>";
    echo "<ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>";
} 

elseif ($newStr == 'studying') {
    $songs = getStudyingSongs();
    echo "<h2>Studying Songs</h2>
        <ul>";
    foreach ($songs as $song) {
        echo "<li>" . $song['title'] . "</li>";
    }
    echo "</ul>
    ";
    
  
} 

elseif ($newStr == 'topgenres') {
    $genres = getTopGenres();
    echo "<h2>Top Genres</h2>
        <ul>";
    foreach ($genres as $genre) {
        echo "<li>" . $genre['genre_name'] . " (Songs: " . $genre['song_count'] . ")</li>";
    }
    echo "</ul>";
}

elseif($newStr == 'popularsongs') {
    $popularArtists = getMostPopularSongs();
    echo "
        <h2>Most Popular Songs</h2>
        <ul>";
    foreach ($popularArtists as $artist) {
        echo "<li>" . $artist['artist_name'] . " (Songs: " . $artist['song_count'] . ")</li>";
    }
    echo "</ul>";
}
elseif ($newStr == 'onehitwonders') {
    $oneHitWonders = $getOneHitWondersSongs();
    echo "
        <h2>One Hit Wonders Songs</h2>
        <ul>";
    foreach ($oneHitWonders as $song) {
        echo "<li>" . $song['title'] . " by " . $song['artist_name'] . " (Popularity: " . $song['popularity'] . ")</li>";
    }
    echo "</ul>";


} 
elseif (isset($_GET['genre'])||isset($_GET['title'])||isset($_GET['artist'])||isset($_GET['genre']) || isset($_GET['year_less']) || isset($_GET['year']) || isset($_GET['year_greater']) && isset($_GET['year'])){
    getSongBrowseSearchResults();

}
elseif (isset($_GET['song_id'])) {

$song = getAllSongsLike($_GET['song_id']);

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

}
else {
    echo "No results found.";

}
 



printFooter();

echo"</body>";
?>







