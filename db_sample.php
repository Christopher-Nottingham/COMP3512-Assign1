<?php require_once('config.inc.php'); ?>
<!DOCTYPE html>
<html>
<body>
<h1>Database Tester (PDO)</h1>
<?php
try {
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM artists";
$result = $pdo->query($sql);
// loop through the data
while ($row = $result->fetch()) {
echo $row['artist_name'] . " - " . $row['artist_id'] . "<br/>";
}
$pdo = null;
}
catch (PDOException $e) {
die( $e->getMessage() );
}
?>
</body>
</html>