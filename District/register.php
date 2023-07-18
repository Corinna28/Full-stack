<?php
session_start();
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

include_once "Template/header.php";
include_once "Template/nav.php";
?>

<div class="container-fluid">

    <!-- Image promotion -->
    <div class="col">
        <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />
    </div>

    <div class="col-4 my-4 mx-auto">
        <nav class="navbar navbar-light ">
            <h2 class="animate__animated animate__bounceInLeft">S'enregistrer</h2>
        </nav>
        <link rel="stylesheet" href="assets/css/style.css">

        <form method="post" action="../script/script_register.php">

            <div class="input-group my-2">
                <h4>Nom Prénom : </h4>
                <input type="text" required="required" name="nom_prenom" value="">
            </div>
            <br>
            <div class="input-group my-2">
                <h4>Email : </h4>
                <input type="Email" required="required" name="email" value="">
            </div>
            <br>
            <div class="input-group my-2">
                <h4>Password : </h4>
                <input type="password" required="required" name="password" value="">
            </div>

            <button type="submit" class="btn btn-outline-light">S'enregistrer</button>
            <a href="" class="btn btn-outline-light">Retour</a>
        </form>
        <img class="trans" src="assets/images/the_district_brand/logo_transparent.png" alt="trans" title="trans" width="200" height="200" />
    </div>





</div>
<?php
include_once "./Template/footer.php";
?>