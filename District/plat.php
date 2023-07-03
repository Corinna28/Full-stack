<?php
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// requetes lancer via le dao




// dans le [] nom indiquer aprés le lien internet


// limit donne le nombre d'image mis sur la pagination


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


    </div>
   
    <?php
    include_once "./Template/footer.php";
    ?>
</div>