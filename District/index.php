<?php
session_start();


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


<div class="container-fluid container-index ">

    <!-- message pour la validation de commande -->
    <?php if (isset($_SESSION['commande_ok'])) : ?>
        <p> <?php echo ($_SESSION['commande_ok']) ?></p>
        <!-- //on l'efface au rechargement de la page -->
    <?php unset($_SESSION['commande_ok']);
    endif ?>

    <!-- Image promotion -->

    <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />



    <div class="row">
        <!-- catégorie -->

        <div class="col-md-12 col-sm-12">
            <h1 class="h1">Catégorie populaires :</h1>
        </div>
        <?php foreach ($cats as $cat) :
        ?>
            <div class="col-4 my-2 mx-auto">
               <a href="platcat.php?cat=<?= $cat->id;?>"> <img src="assets/images/category/<?= $cat->image ?>" width="300" height="400" alt="" class="arrondie"></a>
               <h4><a href="platcat.php?cat=<?= $cat->id;?>"><?= $cat->libelle; ?></h4><a></a>
            </div>
        <?php
        endforeach;
        ?>


        <!-- Quand l'utilisation du foreach avec le end les : sont necessaires aucune accolades -->



        <!-- plats -->

        <div class="col-md-12 col-sm-12">
            <h1 class="h1 titre-index">Plats :</h1>
        </div>

        <?php foreach ($plats as $plat) :
        ?>
            <div class="col-3 my-2 mx-auto">
            <a href="platcat.php?cat=<?= $plat->id_categorie;?>"><img src="assets/images/food/<?= $plat->image ?>" width="300" height="400" alt="" class="arrondie"></a>
            <h4><?= $plat->libelle; ?></h4>
        </div>
        <?php
        endforeach;
        ?>


    </div>
    <?php
    include_once "./Template/footer.php";
    ?>
</div>