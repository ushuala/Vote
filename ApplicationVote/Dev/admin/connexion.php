

<html>
<head>

<?php include('../settings/include.php'); ?>
</head>
<body>


<div class="container">
<h3 class ="center">Connexion à l'interface administrateur</h3>


<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="pseudo" type="text" class="validate" autocomplete="off">
          <label for="pseudo">Identifiant</label>
        </div>
          <div class="input-field col s12">
          <input id="password" type="password" class="validate" autocomplete="off">
          <label for="password">Mot de passe</label>
        </div>
                  <div class="input-field col s12">
        <a class="waves-effect waves-light btn" id="connect" onclick="connectAdmin()">Connexion</a>
        </div>
      </div>
     </form>
</div>
</div>


<?php 
session_start();
/*Already connected ?*/
if(isset($_SESSION['pseudo'])){
	header("index.php");
	echo "<script>window.location.href = 'index.php'; </script>";
}

?>
<?php include('../settings/footer.php'); ?>

<script>
//Get the input field
var mdp = document.getElementById("password");

// Execute a function when the user releases a key on the keyboard
mdp.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("connect").click();
  }
});
var ndc = document.getElementById("pseudo");

//Execute a function when the user releases a key on the keyboard
ndc.addEventListener("keyup", function(event) {
// Number 13 is the "Enter" key on the keyboard
if (event.keyCode === 13) {
 // Cancel the default action, if needed
 event.preventDefault();
 // Trigger the button element with a click
 document.getElementById("connect").click();
}
});


</script>
</body>
</html>


