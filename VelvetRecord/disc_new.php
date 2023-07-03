<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->query("SELECT * FROM artist");

// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute();

// on récupère tous les résultats trouvés dans une variable
$myArtists = $requete->fetchAll(PDO::FETCH_ASSOC);
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
  <title>Disc_New</title>

</head>

<body>
  
  <div class="container">

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand">Ajouter un Vynile</a>
    </nav>
    <br>
    <br>
    <!-- <form action="script_disc_ajout.php" id="formulaire" method="post" enctype="multipart/form-data"> -->
    <form action="script_disc_ajout.php" id="formulaire" method="post" enctype="multipart/form-data">
      <!-- Grâce à enctype, le navigateur du visiteur sait qu'il s'apprête à envoyer des fichiers. -->
      <fieldset>
        <div class="row">

          <div class="col-md-6 mb-5">
            <div class="col-mb-12">
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Title*</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Artist*</label>
                <select class="form-control" name="artist" placeholder="Enter Artist">
                  <option value="">Artist</option>
                  <?php foreach ($myArtists as $artist) { ?>

                    <!-- recupére l'id de l'artiste pour le menu déroulant (option value="................") -->
                    <option value="<?= $artist['artist_id'] ?>"><?= $artist['artist_name'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Year*</label>
                <input type="number" class="form-control" name="year" placeholder="Enter Year">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Genre*</label>
                <input type="text" class="form-control" name="genre" placeholder="Enter genre (Rock,Pop,Prog ...">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Label*</label>
                <input type="text" class="form-control" name="label" placeholder="Enter Label (EMI,Warner, Polygram, Univers sale ...)">
              </div><br>
              <div class="col-mb-3">
                <label for="exampleFormControlInput1">Price*</label>
                <input type="number" class="form-control" name="prix" placeholder="">
              </div><br>



            </div>
            <label for="picture">Picture : </label>
            <br>

            <!-- L'upload de fichier -->

            <input type="file" id="picture" name="picture" accept="image/png, image/jpeg">
            <br>

            <br>
            <!-- Bouton ajouter retour -->
            <button type="submit" class="btn btn-outline-primary">Ajouter</button>
            <a href="index.php" class="btn btn-outline-primary">Retour</a>
          </div>
        </div>
      </fieldset>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>