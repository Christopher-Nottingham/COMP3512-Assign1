<?php 

require_once('config.inc.php');
require_once('helperfiles.php');



?>

<!DOCTYPE html>
<html>
<body>
<h1>Database Tester (PDO)</h1>
<?php

// $data1 = getArtist();
// $data2 = getGenere();

$song = getAllSongsFromYearsGreaterThan(2017);


print_r ($song);

// foreach ($data1 as $row) {
//         echo $row['artist_name'] . "<br/>";
        // } 
        // foreach ($data2 as $row) {
        //     echo $row['genre_name'] . "<br/>";
        //     } 



?>

</body>
</html>