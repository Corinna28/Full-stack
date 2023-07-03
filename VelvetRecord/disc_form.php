<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = ConnexionBase();

// On récupère l'ID passé en paramètre :
$id = $_GET["disc_id"];

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->prepare("SELECT * FROM disc JOIN artist on disc.artist_id = artist.artist_id where disc.disc_id=?");

// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute(array($id));
// on récupère tous les résultats trouvés dans une variable
$modif = $requete->fetch(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();

$requete2 = $db->query("SELECT * FROM artist");
// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete2->execute();
// on récupère tous les résultats trouvés dans une variable
$myArtists = $requete2->fetchAll(PDO::FETCH_OBJ);
$requete2->closeCursor();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Disc_form</title>

</head>

<body>
  
  <div class="container">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand">Modifier un Vynile</a>
    </nav>
    <br>
    <br>
    <br>
    <form action="script_disc_modif.php" id="formulaire" method="post" enctype="multipart/form-data">
      <fieldset>
        <input type="hidden" name="id" value="<?= $modif->disc_id ?>">
        <div class="row">

          <div class="col-md-6 mb-5">
            <div class="col-mb-12">
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Title*</label>
                <input type="text" class="form-control" name="title" value="<?= $modif->disc_title ?>">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Artist*</label>
                <select class="form-control" name="artist">
                  <?php foreach ($myArtists as $artist) { ?>
                    <!-- recupére l'id de l'artiste pour le menu déroulant (option value="................") -->
                    <option value="<?= $artist->artist_id ?>" <?php if ($artist->artist_id == $modif->artist_id) echo 'selected' ?>><?= $artist->artist_name ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Year*</label>
                <input type="text" class="form-control" name="year" value="<?= $modif->disc_year ?>">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Genre*</label>
                <input type="text" class="form-control" name="genre" value="<?= $modif->disc_genre ?>">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Label*</label>
                <input type="text" class="form-control" name="label" value="<?= $modif->disc_label ?>">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Price*</label>
                <input type="text" class="form-control" name="price" value="<?= $modif->disc_price ?>">
              </div><br>

              <!-- L'upload de fichier -->
              <label for="picture">Picture : </label>
              <br>

              <input type="file" id="picture" name="picture" accept="image/png, image/jpeg"></input>
              <br>
              <br>
              <br>
              <!-- Bouton modifier retour -->
              <button type="submit" class="btn btn-outline-primary">Modifier</button>

              <a href="index.php" class="btn btn-outline-primary">Retour</a>
            </div>
          </div>
          <!-- image -->
          <div class="col-md-6 mb-5">
            <div class="row col-mb-12">
              <div class="col-md-6">
                <img src="./Assets/images/<?= $modif->disc_picture ?>" class="w-150"><br>
              </div>
            </div>
          </div>

        </div>
      </fieldset>
    </form>
  </div>
















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>