<?php

include '../settings/database.php';

#Admin


if( isset($_POST['pseudo']) && isset($_POST['password']) ){
	 
	//TEST BD
	try {
		$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
		
		$found = 0;
		//$query = 'SELECT * FROM `admin` WHERE pseudo= ? AND password = MD5("'.$_POST['password'].'")';
		$query = 'SELECT * FROM `admin` WHERE pseudo= ? AND password = MD5(?)';
		$stmt = $dbh->prepare($query);
		//$stmt->execute([$_POST['pseudo']]);
		$stmt->execute([$_POST['pseudo'],$_POST['password']]);
		foreach($stmt as $row){
			$found++;
			break;
		}
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	
	if($found > 0){
		session_start();
		$_SESSION['pseudo'] = $_POST['pseudo'];
		echo "connected";
	}

}

?>