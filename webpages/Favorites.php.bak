<?php
// Start the session to access the favorites list
session_start();

// Initialize the favorites array if it doesn't exist
if (!isset($_SESSION['favorite_songs'])) {
    $_SESSION['favorite_songs'] = array();
}

// Function to remove a song from the favorites list
function removeFromFavorites($songId) {
    if (($key = array_search($songId, $_SESSION['favorite_songs'])) !== false) {
        unset($_SESSION['favorite_songs'][$key]);
    }
}

// Function to clear all favorites
if (isset($_GET['clear'])) {
    $_SESSION['favorite_songs'] = array();
}

// Include your database connection code here

// Function to retrieve song details based on song_id from the database
function getSongDetails($songId) {
    // Replace this with your database query to fetch song details
    // Example: SELECT title, artist_name, year, genre_name, popularity FROM songs WHERE song_id = $songId
    // Execute the query and return the song details
    // You'll need to connect to your database and execute the query here
    // For brevity, I'll simulate song details with an array
    $songDetails = array(
        'title' => 'Sample Song Title',
        'artist_name' => 'Sample Artist Name',
        'year' => 2023,
        'genre_name' => 'Sample Genre',
        'popularity' => 80,
    );
    return $songDetails;
}

// Check if a song should be removed from favorites
if (isset($_GET['remove'])) {
    $songToRemove = $_GET['remove'];
    removeFromFavorites($songToRemove);
}



?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../styling_files/style.css">
    <title>View Favorites</title>
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

    <div class="section">
        <h2>View Favorites</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Popularity</th>
                <th>Actions</th>
            </tr>

            <?php
            // Display each song in the favorites list
            foreach ($_SESSION['favorite_songs'] as $songId) {
                $songDetails = getSongDetails($songId);

                echo "<tr>";
                echo "<td>" . substr($songDetails['title'], 0, 25);
                if (strlen($songDetails['title']) > 25) {
                    echo "&hellip;";
                }
                echo "</td>";
                echo "<td>" . $songDetails['artist_name'] . "</td>";
                echo "<td>" . $songDetails['year'] . "</td>";
                echo "<td>" . $songDetails['genre_name'] . "</td>";
                echo "<td>" . $songDetails['popularity'] . "</td>";
                echo "<td><a href='ViewFavoritesPage.php?remove=$songId'>Remove</a></td>";
                echo "</tr>";
            }
            ?>

         </table>
         <br><a id="altText" href='ViewFavoritesPage.php?clear=1'>Remove All</a>
        <?php 
        printFooter();
        ?>
    </div>

</body>
</html>
