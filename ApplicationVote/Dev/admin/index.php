
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
<div class=" right">
<a class="waves-effect waves-light btn red disconnect " onclick="disconnectAdmin()">Deconnexion</a>
</div>
</div>
<br>
<div class="container"> 
<div class ="row">

<h3 class ="center">Interface administrateur</h3>

<br>
<br>
<div class="center"><a class="waves-effect waves-light btn-large round" onclick="moveCreateSondage()">Création d'un sondage</a> </div><br>
<div class="center"><a class="waves-effect waves-light btn-large round" onclick="moveModifySondage()">Modification du sondage en cours</a> </div><br>
<div class="center"><a class="waves-effect waves-light btn-large round" onclick="moveHistoricSondage()">Historique des sondages</a> </div><br>
 

</div></div>









<?php include('../settings/footer.php'); ?>
</body>
</html>

