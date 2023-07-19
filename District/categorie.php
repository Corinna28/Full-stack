<?php
session_start();

// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


$page = isset($_GET['page'])?$_GET['page']:1;
if ($page <= 0) {
    $page = 1;
}

$limit = 6;

// limit donne le nombre d'image mis sur la pagination
$offset = ($page - 1) * $limit;


// requetes lancer via le dao
$catdivers = getCatdiver($limit, $offset);

// la commande LIMIT permet de spécifier le nombre maximum de résultats que l’on souhaite obtenir, tandis que la commande OFFSET permet d'effectuer un décalage sur l'ensemble des résultats. Un cas d'utilisation courant consiste à utiliser ces commandes dans le cadre du développement d'une pagination.


include_once "Template/header.php";
include_once "Template/nav.php";

?>


<div class="container-fluid g-0">

    <!-- Image promotion -->
    <div class="col">
        <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />
    </div>
    <div class="row">
        <!-- catégorie -->
        <div class="col-md-12 col-sm-12">
            <h1 class="animate__animated animate__bounceInLeft">Catégorie :</h1>
        </div>

        <?php foreach ($catdivers as $catdiver) :
        ?>

            <div class="col-4 my-2 mx-auto">
                <div class="card">
                    <a href="platcat.php?cat=<?= $catdiver->id; ?>"><img src="assets/images/category/<?= $catdiver->image; ?>" width="300" height="300" alt="" class="arrondie">
                        <h3><a href="platcat.php?cat=<?= $catdiver->id; ?>"><?= $catdiver->libelle; ?></h3></a>
                    </a>
                </div>
            </div>

        <?php
        endforeach;
        ?>


    </div>
    <a class="btn btn-outline-light" href="categorie.php?page=<?= $page - 1 ?>" role="button">Précédent</a>
    <a class="btn btn-outline-light" href="categorie.php?page=<?= $page + 1 ?>" role="button">Suivant</a>

    <?php
    include_once "./Template/footer.php";
    ?>
</div>