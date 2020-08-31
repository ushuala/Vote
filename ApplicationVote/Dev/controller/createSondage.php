<?php

include '../settings/database.php';

try {
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	$date = date("Y-m-d H:i:s");
	$nom = $_POST['nom'];
	$options = json_decode(stripslashes($_POST['options']));
	
	$query = 'INSERT INTO sondage (libelle,date_deb) VALUES (?,?)';
	$stmt = $dbh->prepare($query);
	$stmt->execute([$nom,$date]);
	
	$sondageID = $dbh->lastInsertId();
	$optionId = 0;
	echo($options[0]);
	//echo($options[1]);
	//echo($options[2]);
	while(count($options) > $optionId){
		$query = 'INSERT INTO choix (description,sondageId) VALUES (?,?)';
		$stmt = $dbh->prepare($query);
		$stmt->execute([$options[$optionId],$sondageID]);
		$optionId = $optionId + 1;
	}

	
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die(header("HTTP/1.0 404 Not Found")); 
}
$dbh = null;

?>