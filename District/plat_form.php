<?php
session_start();


// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao
$id = intval($_GET['id']);

$modplats = getModifplat(($id));

include_once "Template/header.php";
include_once "Template/nav.php";
?>


<div class="container container_modifp">

    <h1 class="animate__animated animate__bounceInLeft">Modification Plat</h1>



    <form action="script/script_mod_p.php" id="formulaire" name="formulaire" method="post" enctype="multipart/form-data">
        <fieldset>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="row">
                <?php foreach ($modplats as $modplat) : ?>
                    <div class="col-md-6 mb-5 my-2">
                        <div class="col-mb-12">

                            <div class="col-mb-3 my-2">
                                <label for="exampleFormControlInput1">Libelle : </label>
                                <input type="text" class="form-control" name="libelle" value="<?= $modplat->libelle ?>">
                            </div>
                            <div class="col-mb-3 my-2">
                                <label for="exampleFormControlInput1">Description :</label>
                                <input type="text" class="form-control" name="description" value="<?= $modplat->description ?>">
                            </div>

                            <div class="col-mb-3 my-2">
                                <label for="exampleFormControlInput1">Prix :</label>
                                <input type="text" class="form-control" name="prix" value="<?= $modplat->prix ?>">
                            </div>
                            <div class="col-mb-3 my-2">
                                <label for="exampleFormControlInput1">Id Catégorie :</label>
                                <input type="text" class="form-control" name="categorie" value="<?= $modplat->id_categorie ?>">
                            </div>
                            <!-- L'upload de fichier -->
                            <label for="image">Image : </label>
                            <br>

                            <input type="file" id="image" name="image" accept="image/png, image/jpeg"></input>


                            <div class="col-mb-3 my-2">
                                <label for="exampleFormControlInput1">Active :</label>
                                <input type="text" class="form-control" name="active" value="<?= $modplat->active ?>">
                            </div>


                            <!-- Bouton modifier retour -->
                            <button type="submit" class="btn btn-outline-light">Modifier</button>

                            <a href="gestion_plats.php" class="btn btn-outline-light">Retour</a>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </fieldset>
    </form>



    <?php
    include_once "./Template/footer.php";
    ?>
</div>