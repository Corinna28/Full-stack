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
<!-- <h1 class="animate__animated animate__bounceInLeft">An animated element</h1> -->
<?php if (isset($_SESSION['enregistrement'])) : ?>
        <h4> <?php echo ($_SESSION['enregistrement']) ?></h4>
        <!-- //on l'efface au rechargement de la page -->
    <?php unset($_SESSION['enregistrement']);
    endif ?>

    <!-- message pour la validation de commande -->
    <?php if (isset($_SESSION['commande_ok'])) : ?>
        <h4> <?php echo ($_SESSION['commande_ok']) ?></h4>
        <!-- //on l'efface au rechargement de la page -->
    <?php unset($_SESSION['commande_ok']);
    endif ?>

    <!-- Image promotion -->

    <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />



    <div class="row">
        <!-- catégorie -->

        <div class="col-md-12 col-sm-12">
            <h1 class="animate__animated animate__bounceInLeft">Catégories Populaires :</h1>
        </div>
        <?php foreach ($cats as $cat) :
        ?>
            <div class="col-4 my-2 mx-auto">
                <div class="card">
                    <a href="platcat.php?cat=<?= $cat->id; ?>"> <img src="assets/images/category/<?= $cat->image ?>" width="300" height="300" alt="" class="arrondie"></a>
                    <h4><a href="platcat.php?cat=<?= $cat->id; ?>"><?= $cat->libelle; ?><span class="ribbon">HOT</span></h4><a></a>

                </div>
            </div>
        <?php
        endforeach;
        ?>


        <!-- Quand l'utilisation du foreach avec le end les : sont necessaires aucune accolades -->



        <!-- plats -->

        <div class="col-md-12 col-sm-12">
        <h1 class="animate__animated animate__bounceInLeft">Plats Populaires :</h1>
        </div>

        <?php foreach ($plats as $plat) :
        ?>
            <div class="col-3 my-2 mx-auto">
            <div class="card">
                <a href="commande.php?id=<?= $plat->id; ?>"><img src="assets/images/food/<?= $plat->image ?>" width="300" height="300" alt="" class="arrondie"></a>
                <h4><a href="commande.php?id=<?= $plat->id; ?>"><?= $plat->libelle; ?><span class="ribbon">HOT</span></h4><a></a>
                <a href="commande.php?id=<?= $plat->id; ?>">
                <img src="assets/images/61d9831c482674000429052e.png" alt="" width="50" height="50" class="rounded-circle">
                </a>
            </div>
            </div>
        <?php
        endforeach;
        ?>


    </div>
    <?php
    include_once "./Template/footer.php";
    ?>
</div>