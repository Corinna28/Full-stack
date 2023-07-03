<?php
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// requetes lancer via le dao

$page = $_GET['page'];
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
    <img class="pros" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />

    <div class="row">
        <!-- catégorie -->
        <div class="col-md-12 col-sm-12">
            <h1 class="h1">Plats :</h1>
        </div>

        <?php foreach ($Platcats as $Platcat) :
        ?>
            <div class="col-4">

                <img src="assets/images/food/<?= $Platcat->image; ?>" width="300" height="400" alt="" class="arrondie">
                <h3><?= $Platcat->libelle ?></h3>
                <h4><?= $Platcat->description ?></h4>
                <h4><?= $Platcat->prix ?> €</h4>
                <img src="assets/images/61d9831c482674000429052e.png" alt="" width="100" height="100" class="rounded-circle">
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