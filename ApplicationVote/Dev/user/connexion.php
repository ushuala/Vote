<html>
<head>

<?php include('../settings/include.php'); ?>
</head>
<body>


<div class="container">
<div class="row">
<h3 class ="center">Connexion au vote</h3>
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="pseudo" type="text" class="validate" autocomplete="off">
          <label for="pseudo">Pseudonyme</label>
        </div>
                  <div class="input-field col s12">
        <a class="waves-effect waves-light btn connexionUser" onclick="connexionUser()">Connexion</a>
        </div>
      </div>
     </form>
</div>
</div>


<?php include('../settings/footer.php'); ?>
</body>
</html>

