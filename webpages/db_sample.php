<?php 

require_once('config.inc.php');
require_once('helperfiles.php');



?>

<!DOCTYPE html>
<html>
<body>
<h1>Database Tester (PDO)</h1>
<?php

// 
// echo "hi";
// print_r($_SESSION);

$smth = getTopArtist();
print_r($smth);
// echo "hi";
// getTopArtist();

// print_r($_SESSION);


// var_dump(function_exists('mysqli_connect'));
// session_start();
// $data1 = getArtist();
// $data2 = getGenere();

// $song = getAllSongsFromYearsGreaterThan(2017);


// $fav = AddToFave("1003");


// print_r($_SESSION);


// print_r ($song);

// foreach ($data1 as $row) {
//         echo $row['artist_name'] . "<br/>";
        // } 
        // foreach ($data2 as $row) {
        //     echo $row['genre_name'] . "<br/>";
        //     } 



?>




</body>
</html>