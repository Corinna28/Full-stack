<?php
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

include_once "Template/header.php";
include_once "Template/nav.php";
?>

<div class="container-fluid">
    <div class="col-4 my-5 mx-auto border border-light">
        <nav class="navbar navbar-light">
            <a class="navbar-brand inscrit" name="inscrit">S'Inscrire</a>
        </nav>
        <link rel="stylesheet" href="assets/css/style.css">

        <form method="post" name="" action="">
            <div class="input-group mb-3">
                <label>Nom - Prénom : </label>
                <input type="text" name="nomprenom" value="">
            </div>
            <div class="input-group mb-3">
                <label>Email : </label>
                <input type="text" name="mail" value="">
            </div>
            <div class="input-group mb-3">
                <label>Password : </label>
                <input type="password" name="password">
            </div>
            <div class="input-group mb-3">
                <label>Confirmation Password : </label>
                <input type="password" name="confirmation">
            </div>

            <button type="submit" class="btn btn-outline-light">S'inscrire</button>
            <a href="index.php" class="btn btn-outline-light">Retour</a>
        </form>
        <img class="trans" src="assets/images/the_district_brand/logo_transparent.png" alt="trans" title="trans" width="400" height="400" />
    </div>

</div>
<?php
include_once "./Template/footer.php";
?>