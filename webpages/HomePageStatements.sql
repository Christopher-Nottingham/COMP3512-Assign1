-- Top Generes
<?php
function getTopGenres() {
    -- Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    -- SQL query to get top genres
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

        -- Store the results in a session variable
        session_start();
        $_SESSION['top_genres'] = $genres;

        $db->close();
    } else {
        echo "No results found.";
    }
}

-- Check if the "Top Genres" link was clicked
if (isset($_GET['action']) && $_GET['action'] === 'topgenres') {
    -- Call the function when the link is clicked
    getTopGenres();
    header("Location: ThirdPage.php"); // Redirect to the third page
}
?>

-- Top Artist
<?php
function getTopArtist() {
    -- Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    -- SQL query to get top artists
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

        -- Store the results in a session variable
        session_start();
        $_SESSION['top_artists'] = $artists;

        $db->close();
    } else {
        echo "No results found.";
    }
}

-- Call the function when this page is loaded
getTopArtist();
?>

-- Most popular songs 

<?php
function getMostPopularSongs() {
    // Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

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
    header("Location: ThirdPage.php"); // Redirect to the third page
}
?>

--ONE hit wonders
<?php
function getOneHitWondersSongs() {
    // Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

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
    header("Location: ThirdPage.php"); // Redirect to the third page
}
?>


-- Longest Acoustic Song
<?php
function getLongestAcousticSongs() {
    -- Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    -- SQL query to get longest acoustic songs
    $sql = "SELECT title FROM songs
            WHERE acousticness > 40
            ORDER BY duration";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }

        -- Store the results in a session variable
        session_start();
        $_SESSION['longest_acoustic_songs'] = $songs;

        $db->close();
    } else {
        echo "No results found.";
    }
}

-- Call the function when this page is loaded
getLongestAcousticSongs();
?>


-- At the club
<?php
function getAtTheClubSongs() {
    -- Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    -- SQL query to get songs for "At The Club"
    $sql = "SELECT title FROM songs
            WHERE danceability > 85
            ORDER BY ABS(danceability*1.6+energy*1.4) DESC";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }

        -- Store the results in a session variable
        session_start();
        $_SESSION['at_the_club_songs'] = $songs;

        $db->close();
    } else {
        echo "No results found.";
    }
}

-- Call the function when this page is loaded
getAtTheClubSongs();
?>

-- Running
<?php
function getRunningSongs() {
    // Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

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

-- Call the function when this page is loaded 
--move to  main page with an if statment cheking 
--that the buton was preced to call the function 
getRunningSongs();
?>


-- Studyung
<?php
function getStudyingSongs() {
    // Database connection
    $db = new mysqli("hostname", "username", "password", "database_name");

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
    header("Location: ThirdPage.php"); // Redirect to the third page
}
?>
