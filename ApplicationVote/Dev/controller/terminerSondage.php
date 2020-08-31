<?php

include '../settings/database.php';

try {
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	$date = date("Y-m-d H:i:s");
	$sondageId = $_POST['sondageId'];
	$query = 'UPDATE `sondage` SET date_fin = ? WHERE sondageId = ?';
	$stmt = $dbh->prepare($query);
	$stmt->execute([$date, $sondageId]);
	
	echo $sondageId;
	
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die(header("HTTP/1.0 404 Not Found"));
}
$dbh = null;

?>