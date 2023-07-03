<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = ConnexionBase();

// On récupère l'ID passé en paramètre :
$id = $_GET["id"];
// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->prepare("SELECT * FROM disc JOIN artist on disc.artist_id = artist.artist_id where disc.disc_id=?");
// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute(array($id));
// on récupère tous les résultats trouvés dans une variable
$details = $requete->fetch(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disc_detail</title>

</head>

<body>

    <div class="container">

        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand">Détails</a>
        </nav>
        <br>
        <br>
        <br>
        <form action="script_disc_delete.php" id="formulaire" method="post" enctype="multipart/form-data">
            <fieldset>

                <div class="row">

                    <div class="col-md-6 mb-5">
                        <div class="col-mb-12">
                            <div class="col-mb-3">
                                <label for="disabledTextInput" class="form-label">Title*: </label>
                                <input type="text" id="title" class="form-control" placeholder="<?= $details->disc_title ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Year*:</label>
                                <input type="text" id="year" class="form-control" placeholder="<?= $details->disc_year ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Label*:</label>
                                <input type="text" id="label" class="form-control" placeholder="<?= $details->disc_label ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Artist*:</label>
                                <input type="text" id="artist" class="form-control" placeholder="<?= $details->artist_name ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Genre*:</label>
                                <input type="text" id="genre" class="form-control" placeholder="<?= $details->disc_genre ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Price</label>
                                <input type="text" id="price" class="form-control" placeholder="<?= $details->disc_price ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <br>
                        <!-- Bouton modifier supprimer  retour -->
                        <a href="disc_form.php?disc_id=<?= $details->disc_id ?>" class="btn btn-outline-primary">Modifier</a>
                        <a href="script_disc_delete.php?id=<?= $details->disc_id ?>" class="btn btn-outline-primary" onClick="return confirm('supprimer le disque ?')">Supprimer</a>

                        <a href="index.php" class="btn btn-outline-primary">Retour</a>
                    </div>

                    <!-- image -->
                    <div class="col-md-6 mb-5">
                        <div class="row col-mb-12">
                            <div class="col-md-4">
                                <img src="./Assets/images/<?= $details->disc_picture ?>" class="w-150" ><br>
                            </div>
                        </div>
                    </div>
                </div>


            </fieldset>
        </form>
    </div>
</body>