

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
<?php 
//On test si y'a pas déjà un sondage de crée
include '../settings/database.php';

try{
	$dbh = new PDO('mysql:host=localhost;port=3308;dbname=vote', $user, $pass);
	
	
	//Récupération du sondage en cours
	$query = 'SELECT sondageId, libelle,date_deb FROM `sondage` ORDER BY sondageId desc';
	$sondage = $dbh->query($query);
	$sondage = $sondage->fetchAll();
	foreach($sondage as $row){
		//echo $row['libelle'];
	}

} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
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

<h3 class ="center">Historique des sondages</h3>

      <table id="historique" class="display">
    <thead>
        <tr>
            <th>Date</th>
            <th>Question</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    foreach($sondage as $row){
    	echo '<tr class="pointer" onclick =resultats(';
    	echo $row['sondageId'];
		
		
		echo ')>
    	<td>';
    	echo $row['date_deb'];
    	echo '</td>
    	<td>';
    	echo $row['libelle'];
    	echo '</td>
    	</tr>';
    }
    ?>

    </tbody>
</table>

</div></div>

<?php include('../settings/footer.php'); ?>
<script>

$(document).ready(function() {
	
    var table = $('#historique').DataTable({
    	"aaSorting": [],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
        });

} );

</script>
</body>
</html>

