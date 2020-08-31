<?php

include '../settings/database.php';

if( isset($_POST['pseudo'])){
	
	try{
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	$pseudo = $_POST['pseudo'];
	$date = date("Y-m-d H:i:s");
	
	$query = 'INSERT INTO utilisateur (pseudo,date_inscr) VALUES (?,?)';
	$stmt = $dbh->prepare($query);
	$stmt->execute([$pseudo,$date]);
	$utilisateurID = $dbh->lastInsertId();
	
	echo $utilisateurID;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die(header("HTTP/1.0 404 Not Found"));
	}

	$dbh = null;
}
?>