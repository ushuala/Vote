<?php
include '../settings/database.php';

#Admin



if(is_int((int)$_POST['sondageId'])){
	//TEST BD
	try {
		$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
		
		$sondageId = $_POST['sondageId'];
	/*	$query ='select v.choixId, c.description, count(*), s.libelle as c FROM voter v,choix c, sondage s WHERE s.sondageId= '.$sondageId.' AND c.sondageId = '.$sondageId.' AND c.choixId = v.choixId GROUP BY choixId';

		$res = array();

		foreach($dbh->query($query) as $row){
			array_push($res,$row);

		}*/
		$query ='select v.choixId, c.description, count(*), s.libelle as c FROM voter v,choix c, sondage s WHERE s.sondageId= ? AND c.sondageId = ? AND c.choixId = v.choixId GROUP BY choixId';
		$stmt = $dbh->prepare($query);
		$stmt->execute([$sondageId,$sondageId]);
		$res = array();
		foreach ($stmt as $row)
		{
			array_push($res,$row);
		}

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	
	echo json_encode($res);
}
?>