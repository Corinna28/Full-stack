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


<div class="container-fluid g-0">

    <!-- Image promotion -->
    <img class="pros" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />
    <p class="h1">Mentions Légales</p>
    <img class="trans" src="assets/images/the_district_brand/logo_transparent.png" alt="trans" title="trans" width="400" height="400" />

    <p>Le site Internet district.com est la propriété exclusive de Corinna Fournier.
    <div class="col-md-12 col-xs-12">
        <pre><h6> Siret : 83120628250223
        Propriétaire : Corinna Fournier
        E-mail : corinna@district.com
        Téléphone : 05 42 65 32 79
        Conception du site internet : Corinna Fournier
        Le site est hébergé par la société AFPA, 30 rue de Poulainville, 80000 AMIENS, Capital de 100000 euros, Siret : 000 000 00000024.</pre>
        </h6>

    </div>

    <?php
    include_once "./Template/footer.php";
    ?>


</div>