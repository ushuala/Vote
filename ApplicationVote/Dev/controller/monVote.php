<?php
include '../settings/database.php';

#Admin

//TEST BD
try {
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	$idChoix = $_POST['idChoix'];
	$query ='select description FROM choix WHERE choixId= ?';
	$stmt = $dbh->prepare($query);
	$stmt->execute([$idChoix]);
	
	foreach ($stmt as $row)
	{
		echo $row[0];
	}



	
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}


?>