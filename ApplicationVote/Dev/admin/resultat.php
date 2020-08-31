

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

<h3 class ="center">Résultats du sondage</h3>
<h5 class ="center" id="nomSondage"></h5>
<div class="center s6">

<div class="chart-container" style="position: relative; height:300; width:300">
    <canvas id="myChart"></canvas>
</div>
        <a class="waves-effect waves-light btn" onclick="loadStats()">Actualiser</a>


 </div>
   <div class="left s6">
           <div id="nbVotant" class="left"></div><br> <br>
           <div id="votants" class="left"></div>
</div>
</div></div>

<?php include('../settings/footer.php'); ?>
<script type="text/javascript">

//Chargement du graphique
loadStats();

</script>
</body>
</html>

