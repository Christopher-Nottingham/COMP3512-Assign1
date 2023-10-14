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
    // Database connection double checknot conected  
	
    $db = new mysqli("localhost", "root", "", DBCONNSTRING);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // SQL query to fetch song details
    $sql = "SELECT title, artist_name, year, genre_name, popularity FROM songs WHERE song_id = ?";

    // Prepare the SQL statement
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $songId);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $songDetails = $result->fetch_assoc();

            // Close the prepared statement and the database connection
            $stmt->close();
            $db->close();

            return $songDetails;
        } else {
            // No results found
            $stmt->close();
            $db->close();
            return null;
        }
    } else {
        // Error in preparing the statement
        $db->close();
        return null;
    }
}

// Example usage:
$songId = 1; // Replace with the desired song ID
$songDetails = getSongDetails($songId);

if ($songDetails) {
    // Output the song details
    echo "Title: " . $songDetails['title'] . "<br>";
    echo "Artist: " . $songDetails['artist_name'] . "<br>";
    echo "Year: " . $songDetails['year'] . "<br>";
    echo "Genre: " . $songDetails['genre_name'] . "<br>";
    echo "Popularity: " . $songDetails['popularity'] . "<br>";
} else {
    echo "Song not found.";
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
        <a id="white" href="./Home.php">Home</a>&nbsp;
        <a id="white" href="./SingleSong.php">Single Song</a>&nbsp;
        <a id="white" href="./Favorites.php">Favorites</a>    &nbsp;
        <a id="white" href="./Browse-Search-Results.php">Browse/Search Results</a>&nbsp;
    <a id="white" href="./Search.php">Search</a>    &nbsp;
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
                echo "<td><a href='SingleSong.php?song_id=".$songId."'>Remove</a></td>";
                echo "<td><a href='ViewFavoritesPage.php?remove=".$songId."'>Remove</a></td>";
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
