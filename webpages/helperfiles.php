<?php
require_once("config.inc.php");
session_start();

function getArtist()
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql    = "SELECT * FROM artists";
        $result = $pdo->query($sql);
        return $artistData = $result->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    
}

function getGenre()
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql    = "SELECT * FROM genres";
        $result = $pdo->query($sql);
        return $genereData = $result->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
}
function printHeader (){
   echo"<header>";
   echo "<h1>COMP 3512</h1>"; 
   echo "<h2>&copy Christopher Nottingham and Obayda Daoud</h2>";
   echo "<nav";
   echo "<a href='./Home.php'>Home</a>" ;
   echo "<a href='./SingleSong.php'>Single Song</a>";
   echo "<a href='./Favorites.php'>Favorites</a>";     
   echo "<a href='./Browse-Search-Results.php'>Browse/Search Results</a>";
   echo "<a href='./aboutus.php'>About Us</a>";
   echo "</nav";
   echo "</header>";
}
function printFooter(){
    echo "<footer class='footer' id = 'text'>COMP 3512 -001 | &copy <a href='https://github.com/Christopher-Nottingham'>&nbsp;Christopher Nottingham&nbsp;</a>  and  <a href='https://github.com/ObaydaD'> &nbsp;Obayda Daoud&nbsp; </a> |  <a href='https://github.com/Christopher-Nottingham/COMP3512-Assign1'>&nbsp;GitHub Repo&nbsp;</a></footer>";
}

function getSongs()
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql    = "SELECT * FROM songs";
        $result = $pdo->query($sql);
        return $songData = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    
}
function getSongBrowseSearchResults(){
        if (!empty($_GET['title'])){
                $song = getAllSongsLike($_GET['title']);
                foreach ($song as $row){
                    echo "<tr>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['artist_name']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['genre_name']."</td>";
                    echo "<td>".$row['popularity']."</td>";
                    echo "<td><a href='addToFavorites.php?id=".$row['song_id']."'>Favorite Me</a></td>";
                    echo "<td><a href='SingleSong.php?song_id=".$row['song_id']."'>Click Me</a></td>";
                    echo "</tr>";
                }
         } elseif (!empty($_GET['artist'])){
            $listofartist = getAllSongsFromArtist($_GET['artist']);
            foreach ($listofartist as $row){
            echo "<tr>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['artist_name']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td>".$row['genre_name']."</td>";
            echo "<td>".$row['popularity']."</td>";
            echo "<td><a href='addToFavorites.php?id=".$row['song_id']."'>Favorite Me</a></td>";
            echo "<td><a href='SingleSong.php?song_id=".$row['song_id']."'>Click Me</a></td>";
            echo "</tr>";
            } 
        } elseif (!empty($_GET['year_less'])){
                $year = getAllSongsFromYearsLessThan($_GET['year_less']);
                foreach ($year as $row){
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['artist_name']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['genre_name']."</td>";
                echo "<td>".$row['popularity']."</td>";
                echo "<td><a href='addToFavorites.php?id=".$row['song_id']."'>Favorite Me</a></td>";
                echo "<td><a href='SingleSong.php?song_id=".$row['song_id']."'>Click Me</a></td>";
                echo "</tr>";
                } 
            }
            elseif (!empty($_GET['year_greater'])){
                $year = getAllSongsFromYearsGreaterThan($_GET['year_greater']);
                foreach ($year as $row){
                echo "<tr>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['artist_name']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['genre_name']."</td>";
                echo "<td>".$row['popularity']."</td>";
                echo "<td><a href='addToFavorites.php?id=".$row['song_id']."'>Favorite Me</a></td>";
                echo "<td><a href='SingleSong.php?song_id=".$row['song_id']."'>Click Me</a></td>";
                echo "</tr>";
                } 
            } else{
                $songs = getAllSongInfo();
            foreach ($songs as $row){
                    echo "<tr>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['artist_name']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['genre_name']."</td>";
                    echo "<td>".$row['popularity']."</td>";
                    echo "<td><a href='addToFavorites.php?id=".$row['song_id']."'>Favorite Me</a></td>";
                    echo "<td><a href='SingleSong.php?song_id=".$row['song_id']."'>Click Me</a></td>";
                    echo "</tr>";
            } 
        }
    }        

function getArtist_From_Song_ID($songid)
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql    = "SELECT title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity
        FROM artists as a, genres as g, songs as s, types as t
        WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id
        AND song_id = " . $songid . "" ;
        $result = $pdo->query($sql);
        return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);
  $pdo = null;
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    
}

function getAllSongsLike($song){
        try {
                $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql    = "SELECT title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity FROM artists as a, genres as g, songs as s, types as t WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id AND title LIKE '%".$song."%'";
                
                $result = $pdo->query($sql);
                return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);
          $pdo = null;
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }

}
function getAllSongsFromYearsGreaterThan($year){

        try {
                $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql    = "SELECT song_id ,title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity
                FROM artists as a, genres as g, songs as s, types as t
                WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id AND year > ".$year."";
         $result = $pdo->query($sql);
         return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);
        //  $pdo = null;
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }

}

function getAllSongsFromYearsLessThan($year){
        try {
                $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql    = "SELECT song_id ,title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity
                FROM artists as a, genres as g, songs as s, types as t
                WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id AND year < ".$year."";
         $result = $pdo->query($sql);
         return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);
        //  $pdo = null;
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }
}

function getAllSongsFromGenereLike($genere){
        try {
                $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql    = "SELECT title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity FROM artists as a, genres as g, songs as s, types as t WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id AND genre_name = '".$genere."'";
                
                $result = $pdo->query($sql);
                return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);
          $pdo = null;
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }
}

function getAllSongsFromArtist($artist){
        try {
                $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql    = "SELECT title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity FROM artists as a, genres as g, songs as s, types as t WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id AND artist_name = '".$artist."'";
                
                $result = $pdo->query($sql);
                return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);
          $pdo = null;
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }

}



function getAllSongInfo() 
{

    try {



        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql    = "SELECT song_id ,title, year ,artist_name , a.artist_id, g.genre_name, s.genre_id, duration, bpm,  energy, danceability, liveness, valence, acousticness, speechiness, popularity
        FROM artists as a, genres as g, songs as s, types as t
        WHERE a.artist_id = s.artist_id AND s.genre_id = g.genre_id AND t.type_id = a.artist_type_id";
 $result = $pdo->query($sql);
 return $ASData = $result->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    
}














// Top Generes
<?php
function getTopGenres() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get top genres
    $sql = "SELECT genres.genre_name, COUNT(songs.song_id) AS song_count
            FROM genres
            INNER JOIN songs ON genres.genre_id = songs.genre_id
            GROUP BY genres.genre_name
            ORDER BY song_count DESC
            LIMIT 10";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $genres = array();
        while ($row = $result->fetch_assoc()) {
            $genres[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['top_genres'] = $genres;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "Top Genres" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'topgenres') {
    // Call the function when the link is clicked
    getTopGenres();
    header("Location: SingleSong.php"); // Redirect to SingleSong page 
}
?>


// top Artist
<?php
// Function to get the top artist
function getTopArtist() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get top artists
    $sql = "SELECT artists.artist_id, artists.artist_name, COUNT(songs.artist_id) AS song_count
            FROM songs
            INNER JOIN artists ON songs.artist_id = artists.artist_id
            GROUP BY artists.artist_id, artists.artist_name
            ORDER BY song_count DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $artists = array();
        while ($row = $result->fetch_assoc()) {
            $artists[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['top_artists'] = $artists;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "Top Artist" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'topartist') {
    // Call the function when the link is clicked
    getTopArtist();
    header("Location: SingleSong.php"); // Redirect to the SingleSong
}
?>

// Most popular songs 

<?php
function getMostPopularSongs() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get the most popular songs
    $sql = "SELECT artists.artist_name, COUNT(songs.song_id) AS song_count
            FROM artists
            INNER JOIN songs ON artists.artist_id = songs.artist_id
            GROUP BY artists.artist_name
            ORDER BY song_count DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $popularArtists = array();
        while ($row = $result->fetch_assoc()) {
            $popularArtists[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['popular_artists'] = $popularArtists;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "Most Popular Songs" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'popularsongs') {
    // Call the function when the link is clicked
    getMostPopularSongs();
    header("Location: SingleSong.php"); // Redirect to SingleSong page 
}
?>

//ONE hit wonders
<?php
function getOneHitWondersSongs() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get one-hit wonders songs
    $sql = "SELECT songs.title, artists.artist_name, songs.popularity
            FROM songs
            INNER JOIN artists ON songs.artist_id = artists.artist_id
            WHERE songs.artist_id IN (
                SELECT artist_id
                FROM songs
                GROUP BY artist_id
                HAVING COUNT(*) = 1
            )
            ORDER BY songs.popularity DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $oneHitWonders = array();
        while ($row = $result->fetch_assoc()) {
            $oneHitWonders[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['one_hit_wonders'] = $oneHitWonders;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "One Hit Wonders Songs" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'onehitwonders') {
    // Call the function when the link is clicked
    getOneHitWondersSongs();
    header("Location: SingleSong.php"); // Redirect to SingleSong page 
}
?>


// Longest Acoustic Song
<?php
function getLongestAcousticSongs() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get longest acoustic songs
    $sql = "SELECT title FROM songs
            WHERE acousticness > 40
            ORDER BY duration";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['longest_acoustic_songs'] = $songs;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "Longest Acoustic Songs" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'longestacoustic') {
    // Call the function when the link is clicked
    getLongestAcousticSongs();
    header("Location: SingleSong.php"); // Redirect to the SingleSong
}
?>



// At the club
<?php
function getAtTheClubSongs() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get songs for "At The Club"
    $sql = "SELECT title FROM songs
            WHERE danceability > 85
            ORDER BY ABS(danceability*1.6+energy*1.4) DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['at_the_club_songs'] = $songs;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "At The Club" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'attheclub') {
    // Call the function when the link is clicked
    getAtTheClubSongs();
    header("Location: SingleSong.php"); // Redirect to the SingleSong
}
?>


// Running
<?php
function getRunningSongs() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get running songs
    $sql = "SELECT title FROM songs
            WHERE bpm BETWEEN 120 AND 125
            ORDER BY ABS(energy * 1.3 + valence * 1.6) DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['running_songs'] = $songs;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "Running Songs" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'runningsongs') {
    // Call the function when the link is clicked
    getRunningSongs();
    header("Location: SingleSong.php"); // Redirect to the SingleSong
}
?>


// Studyung
<?php
function getStudyingSongs() {
    // Database connection
    $db = new mysqli("localhost", "root", "", "sqlite:../databases/music.db");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to get studying songs
    $sql = "SELECT title FROM songs
            WHERE bpm BETWEEN 100 AND 115
            AND speechiness BETWEEN 1 AND 20
            ORDER BY ABS((acousticness * 0.8) + (100-speechiness) + (100-valence)) DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }

        // Store the results in a session variable
        session_start();
        $_SESSION['studying_songs'] = $songs;

        $db->close();
    } else {
        echo "No results found.";
    }
}

// Check if the "Studying" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'studying') {
    // Call the function when the link is clicked
    getStudyingSongs();
    header("Location: SingleSong.php"); // Redirect to SingleSong page 
}
?>
