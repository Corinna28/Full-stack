<?php
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

$cats = getCategorie();

$plats = getPlat();

include_once "Template/header.php";
include_once "Template/nav.php";
?>


<div class="container-fluid g-0">
   
 <!-- Image promotion -->

    <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />

    

    <div class="row">
        <!-- catégorie -->

        <div class="col-md-12 col-sm-12">
            <h1 class="h2">Catégorie populaires :</h1>
        </div>
        <?php foreach ($cats as $cat) :
        ?>
            <div class="col-3">
                <img src="assets/images/category/<?= $cat->image ?>" width="300" height="400" alt="" class="arrondie">
            </div>
        <?php
        endforeach;
        ?>


        <!-- Quand l'utilisation du foreach avec le end les : sont necessaires aucune accolades -->



        <!-- plats -->

        <div class="col-md-12 col-sm-12">
            <p class="h2">Plats :</p>
        </div>

        <?php foreach ($plats as $plat) :
        ?>
            <div class="col-3">
                <img src="assets/images/food/<?= $plat->image ?>" width="300" height="400" alt="" class="arrondie">
            </div>
        <?php
        endforeach;
        ?>


    </div>
    <?php
    include_once "./Template/footer.php";
    ?>
</div>