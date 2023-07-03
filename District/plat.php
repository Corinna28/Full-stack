<?php
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// requetes lancer via le dao

$platalls = getPlatall();



include_once "Template/header.php";
include_once "Template/nav.php";

?>


<div class="container-fluid g-0">

    <!-- Image promotion -->
    <img class="pros" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />

    <div class="row">
        <!-- catégorie -->
        <div class="col-md-12 col-sm-12">
            <h1 class="h1">Plats :</h1>
        </div>


        <?php foreach ($platalls as $platall) :
        ?>
            <div class="col-4">

                <img src="assets/images/food/<?= $platall->image ?>" width="300" height="350" alt="" class="arrondie">
                <h3><?= $platall->libelle ?></h3>
                <h4><?= $platall->description ?></h4>
                <h4><?= $platall->prix ?>€</h4>
                <img src="assets/images/61d9831c482674000429052e.png" alt="" width="100" height="100" class="rounded-circle">
            </div>

        <?php
        endforeach;
        ?>

    </div>

    <?php
    include_once "./Template/footer.php";
    ?>
</div>