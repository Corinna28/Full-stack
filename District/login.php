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

    <div class="col-4 my-4 mx-auto border border-light">
        <nav class="navbar navbar-light ">
            <a class="navbar-brand connecter">Se Connecter</a>
        </nav>
        <link rel="stylesheet" href="assets/css/style.css">

        <form method="post" action="../script/login_script.php">
            <div class="input-group ">
                <label>Username : </label>
                <input type="text" required="required" name="username" value="">
            </div>
            <br>
            <div class="input-group my-5">
                <label>Password : </label>
                <input type="password" required="required" name="password">
            </div>
            
            <button type="submit" class="btn btn-outline-light">Se connecter</button>
            <a href="" class="btn btn-outline-light">Retour</a>
        </form>
        <img class="trans" src="assets/images/the_district_brand/logo_transparent.png" alt="trans" title="trans" width="400" height="400" />
    </div>





</div>
<?php
include_once "./Template/footer.php";
?>