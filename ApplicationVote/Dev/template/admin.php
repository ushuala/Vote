
<html>
<head>

<?php include('../settings/include.php'); ?>
</head>
<body>


<div class="container"> 
<a class="waves-effect waves-light btn  index" onclick="retourIndex()">Index</a>
<a class="waves-effect waves-light btn red disconnect" onclick="disconnectAdmin()">Deconnexion</a>
<div class ="row">

<h3 class ="center">Titre</h3>


</div></div>
<?php 
session_start();
/*Already connected ?*/
if(!isset($_SESSION['pseudo'])){
	echo "<script>window.location.href = 'connexion.php'; </script>";
}
?>
<?php include('../settings/footer.php'); ?>
</body>
</html>

