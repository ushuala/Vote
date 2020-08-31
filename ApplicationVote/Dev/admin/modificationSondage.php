

<html>
<head>

<?php include('../settings/include.php'); ?>
</head>
<body>


<?php 
session_start();
/*Already connected ?*/
if(!isset($_SESSION['pseudo'])){
	echo "<script>window.location.href = '../accueil.php'; </script>";
}
?>
<div class ="row">
<div class=" left">
<a class="waves-effect waves-light btn  index" onclick="retourIndex()">Index</a>
</div>
<div class=" right">
<a class="waves-effect waves-light btn red disconnect " onclick="disconnectAdmin()">Deconnexion</a>
</div>
</div>
<br>

<div class="container"> 
<div class ="row">

<h3 class ="center">Sondage en cours</h3>

<?php

include '../settings/database.php';

try{
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	
	//Récupération du sondage en cours
	$query = 'SELECT * FROM `sondage` WHERE date_fin IS NULL';
	$sondage = $dbh->query($query);
	$sondage = $sondage->fetch(PDO::FETCH_ASSOC);
	if(is_array($sondage)){
	
	//Récupération des options qui lui sont liées
	$query ='SELECT * from `choix` WHERE sondageId ='.$sondage["sondageId"].' ORDER BY choixId ASC';
	$options = array();
	foreach($dbh->query($query) as $row){
		array_push($options,$row);
		//echo $row["description"];
	}
	}
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

?>


<div class="row">
<?php 
if(is_array($sondage)){
?>
    <form class="col s12" action="#">
    <h3><?php echo $sondage["libelle"] ?></h3>
    <br>
    <?php 
     $i = 0;
     $nbOptions = count($options);
     while ($i < $nbOptions){
     	echo ' <p>
      <label>
        <input name="vote" disabled type="radio" value = "'. $options[$i]["choixId"].'"/>
        <span>'. $options[$i]["description"].'</span>
      </label>

    </p>';
     	$i++;
     }
    ?>
    	<a class="waves-effect waves-light btn blue" onclick="resultats(<?php echo $sondage["sondageId"]?>)"> Résultats</a>
        <a class="waves-effect waves-light btn red modal-trigger" href="#confEndSondage">Terminer le sondage</a>
        
    </form>
    
    <div id="confEndSondage" class="modal">
    <div class="modal-content">
      <h4>Fermeture du sondage</h4>
      <p>Il ne sera plus possible de voter à ce sondage.</p>
    </div>
    <div class="modal-footer">
      <a onclick="endSondage()" class="modal-close waves-effect waves-green btn red">Confirmer</a>
    </div>
  </div>
     <?php 
}
else {
?>

<div class ="center"> Aucun sondage en cours. <a href="creationSondage.php"> Créer un sondage.</a></div>

 <?php 
}
?>
</div>
</div></div>

<?php include('../settings/footer.php'); ?>

<script>

$(document).ready(function(){
    $('.modal').modal();
	window.sondageId =<?php echo $sondage["sondageId"]?> ;
  });
</script>

</body>
</html>

