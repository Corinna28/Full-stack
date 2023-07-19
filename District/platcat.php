<?php
session_start();

// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// requetes lancer via le dao

$page = isset($_GET['page'])?$_GET['page']:1;
if ($page <= 0) {
    $page = 1;
}

$limit = 6;


// dans le [] nom indiquer aprés le lien internet

$id = $_GET['cat'];
if ($id <= 0) {
    $id = 1;
}


// limit donne le nombre d'image mis sur la pagination

$offset = ($page - 1) * $limit;

$Platcats = getPlatcat($limit, $offset, $id);

// la commande LIMIT permet de spécifier le nombre maximum de résultats que l’on souhaite obtenir, tandis que la commande OFFSET permet d'effectuer un décalage sur l'ensemble des résultats. Un cas d'utilisation courant consiste à utiliser ces commandes dans le cadre du développement d'une pagination.





include_once "Template/header.php";
include_once "Template/nav.php";

?>


<div class="container-fluid g-0">

    <!-- Image promotion -->
    <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />

    <div class="row">
        <!-- catégorie -->
        <div class="col-md-12 col-sm-12">
        <h1 class="animate__animated animate__bounceInLeft">Plats :</h1>
        </div>

        <?php foreach ($Platcats as $Platcat) :
        ?>
            <div class="col-4">
            <div class="card">
            <a href="commande.php?id=<?= $Platcat->id; ?>"><img src="assets/images/food/<?= $Platcat->image; ?>" width="300" height="300" alt="" class="arrondie"></a>
                <h3><a href="commande.php?id=<?= $Platcat->id; ?>"><?= $Platcat->libelle ?></h3></a>
                <h6><?= $Platcat->description ?></h6>
                <h3><?= $Platcat->prix ?> €</h3>

                <a href="commande.php?id=<?= $Platcat->id; ?>">
                <img src="assets/images/61d9831c482674000429052e.png" alt="" width="70" height="70" class="rounded-circle">
                </a>
            </div>
            </div>

        <?php
        endforeach;
        ?>

    </div>
    <!-- ?cat= (recupere l'id) &page= (recupere la page) -->

    <a class="btn btn-outline-light" href="?cat=<?= $id ?>&page=<?= $page - 1 ?>" role="button">Précédent</a>
    <a class="btn btn-outline-light" href="?cat=<?= $id ?>&page=<?= $page + 1 ?>" role="button">Suivant</a>

    <?php
    include_once "./Template/footer.php";
    ?>
</div>