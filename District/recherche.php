<?php
session_start();


// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// $libelle = isset($_GET['recherche']) ? $_GET['recherche'] : null;

if (isset($_GET['recherche']))
    $libelle = $_GET['recherche'];
else
    $libelle = null;

// requetes lancer via le dao
$catres = getRecherchecat($libelle);
$platres = getRechercheplat($libelle);


include_once "Template/header.php";
include_once "Template/nav.php";
?>

<body>
    <div class="container-fluid container-recherche">
        <!-- Image promotion -->
        <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />

        <div class="row ">
            <h4>&#128269 Résultat Catégorie : </h4>


            <?php
            if (!empty($catres)) {
                foreach ($catres as $catre) :
            ?>
                    <div class="col-4 my-2 mx-auto container-recherche">
                    <div class="card">
                        <img src="assets/images/category/<?= $catre['image']; ?>" width="300" height="350" alt="" class="arrondie">
                        <h3><a href="platcat.php?cat=<?= $catre['id']; ?>"><?= $catre['libelle']; ?></h3><a></a>

                        

                    </div>
                    </div>
            <?php
                endforeach;
            } else {
                echo '<h5 class="animate__animated animate__bounceInLeft">Aucun résultat trouvé</h5>';
            }
            ?>

            <h4>&#128269 Résultat Plat : </h4>

            <?php
            if (!empty($platres)) {
                foreach ($platres as $platre) :
            ?>
            <div class="col-4 my-2 mx-auto container-recherche">
            <div class="card">
                    
                        <img src="assets/images/food/<?= $platre['image']; ?>" width="300" height="350" alt="" class="arrondie">
                        <h3><a href="commande.php?id=<?= $platre['id']; ?>"><?= $platre['libelle']; ?></h3><a></a>

                    </div>
            </div>
            <?php
                endforeach;
            } else {
                echo '<h5 class="animate__animated animate__bounceInLeft"> Aucun résultat trouvé</h5>';
            }
            ?>

        </div>

        <?php
        include_once "./Template/footer.php";
        ?>
</body>