<?php
require_once("config.inc.php");



function getArtist(){
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM artists";
        $result = $pdo->query($sql);
        return $artistData = $result->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        }
        catch (PDOException $e) {
        die( $e->getMessage() );
        }

}

function getGenere(){
try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM genres";
        $result = $pdo->query($sql);
        return $genereData = $result->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        }
        catch (PDOException $e) {
        die( $e->getMessage() );
        }
}

?>