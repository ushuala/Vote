<?php

include '../settings/database.php';

try {
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	$userId = $_POST['userId'];
	$option= $_POST['option'];
	
	$query = 'INSERT INTO voter (utilisateurId,choixId) VALUES (?,?)';
	$stmt = $dbh->prepare($query);
	$stmt->execute([$userId,$option]);
	
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die(header("HTTP/1.0 404 Not Found"));
}
echo "success";
$dbh = null;

?>