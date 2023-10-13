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
