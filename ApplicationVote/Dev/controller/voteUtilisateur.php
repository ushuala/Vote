<?php
include '../settings/database.php';

#Admin



if(is_int((int)$_POST['sondageId'])){
	//TEST BD
	try {
		$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
		
		$sondageId = $_POST['sondageId'];
		$query ='SELECT u.pseudo, c.description FROM utilisateur u, choix c, voter v WHERE c.sondageId=? AND u.utilisateurId = v.utilisateurId AND v.choixId = c.choixId ORDER BY u.pseudo';
		$stmt = $dbh->prepare($query);
		$stmt->execute([$sondageId]);
		
		$res = array();
		foreach ($stmt as $row)
		{
			array_push($res,$row);
		}
		//var_dump($res);
		
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	
	echo json_encode($res);
}
?>