<?php
    session_start();
    if ( !isset($_SESSION["FavoriteSongs"]) ) {     
    $_SESSION["FavoriteSongs"] = []; }
    $favorites = $_SESSION["FavoriteSongs"];
    $favorites[] = $_GET["id"];
    $_SESSION["FavoriteSongs"] = $favorites;
    header("Location: " . $_SERVER["HTTP_REFERER"]);
?>

