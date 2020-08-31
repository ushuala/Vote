<?php
include '../settings/database.php';

#Admin



if(is_int((int)$_POST['sondageId'])){
	//TEST BD
	try {
		$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
		
		$sondageId = $_POST['sondageId'];
		$query ='select * FROM sondage WHERE sondageId= ? AND date_fin IS NOT NULL';
		$stmt = $dbh->prepare($query);
		$stmt->execute([$sondageId]);
		$res = 0;
		foreach ($stmt as $row)
		{
			$res++;
		}
		
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	
	echo $res;
}
?>