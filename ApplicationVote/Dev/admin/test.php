

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

<div class="container">
<a class="waves-effect waves-light btn  index" onclick="retourIndex()">Index</a>
<a class="waves-effect waves-light btn red disconnect" onclick="disconnectAdmin()">Deconnexion</a>
<div class="row">
 <div class="col s12">

 <h3 class ="center">Résultats du vote</h3>
 <div class="center s6">

<canvas  id="myChart" width="300" height="300"></canvas>
        <a class="waves-effect waves-light btn" onclick="loadStats()">Actualiser</a>

 </div>
  <div class="left s6">
           <div id="nbVotant" class="left"></div>
           <div id="votants" class="left"></div>
</div>
 </div>
</div>
</div>

<?php include('../settings/footer.php'); ?>
<script type="text/javascript">

//Chargement du graphique
loadStats();

</script>
</body>
</html>

