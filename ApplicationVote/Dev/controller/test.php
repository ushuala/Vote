<?php

include '../settings/database.php';


try {
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	$date = date("Y-m-d H:i:s");
	$nom ="nom";
	$options = ["a","b"];
	
	$query = 'INSERT INTO sondage (libelle,date_deb) VALUES (?,?)';
	$stmt = $dbh->prepare($query);
	$stmt->execute([$nom,$date]);
	
	$sondageID = $dbh->lastInsertId();
	print $sondageID;
	$optionId = 0;
	while(count($options) > $optionId){
		print $options[$optionId];
		$query = 'INSERT INTO choix (description,sondageId) VALUES (?,?)';
		$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$stmt = $dbh->prepare($query);

		$stmt->execute([$options[$optionId],$sondageID]);
		print_r($stmt->errorInfo());
		$optionId = $optionId+1;
	}

	
	
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die(header("HTTP/1.0 404 Not Found"));
}
$dbh = null;

?>