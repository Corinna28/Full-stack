<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");

// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute();

// on récupère tous les résultats trouvés dans une variable
$myDiscs = $requete->fetchAll(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Disc</title>

</head>

<body>

  <div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand">Liste des Disques</a>
      <form class="form-inline">
        <a href="./login.php" class="btn btn-primary">Se Connecter</a>
        <a href="./register.php" class="btn btn-primary">S'enregistrer</a>
        <a href="./disc_new.php" class="btn btn-primary">Ajouter</a>
      </form>
    </nav>
    <br>
    <br>
    <div class="row  ">
      <?php foreach ($myDiscs as $disc) {
      ?>
        <div class="col-md-6 mb-5">
          <div class="row col-md-12">
            <div class="col-md-6">
              <img src="Assets/images/<?= $disc->disc_picture ?>" class="w-100"><br>
            </div>
            <div class="col-md-6">
              <div>
                <?= $disc->disc_title ?><br>
                <br>
                <b>Artist : </b><?= $disc->artist_name ?><br>
                <br>
                <b>Year : </b><?= $disc->disc_year ?><br>
                <br>
                <b>Genre : </b><?= $disc->disc_genre ?><br>
                <br>

              </div>
              <div>
                <!-- Récupère l'ID généré à partir de l'opération INSERT précédente -->
                <a href="disc_detail.php?id=<?= $disc->disc_id ?>" class="btn btn-outline-primary">Détails</a>
              </div>
            </div>
          </div>
        </div>


      <?php
      }
      ?>
    </div>
  </div>
</body>

</html>