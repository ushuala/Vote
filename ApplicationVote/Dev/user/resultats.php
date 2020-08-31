

<html>
<head>

<?php include('../settings/include.php'); ?>
</head>
<body>
<?php 
/*Already connected ?*/
if(!isset($_COOKIE['username'])){
	echo "<script>window.location.href = 'connexion.php'; </script>";
}
?>

<div class="container">

<div class="row">
 <div class="col s12">
 <h3 class ="center">Résultats du vote</h3>
 <h5 class ="center" id="nomSondage"></h5>
 <div class="center s6">
 
 <div class="chart-container" style="position: relative; height:300; width:300;">
    <canvas id="myChart" class =" center"></canvas>
    <div id ="pasFini"></div>
</div>
        <a class="waves-effect waves-light btn" onclick="loadStats()">Actualiser</a>
 
 </div>
 
    <div class="left s6">
           <div id="monVote" class="left"></div><br>
</div>
 </div>
</div>
</div>

<?php include('../settings/footer.php'); ?>
<script type="text/javascript">

//Chargement du graphique
loadStats();
monVote();
</script>
</body>
</html>

