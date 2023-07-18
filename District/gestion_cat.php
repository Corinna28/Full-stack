<?php
session_start();


// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

$catgs = getCatgest();

include_once "Template/header.php";
include_once "Template/nav.php";
?>



<h1 class="animate__animated animate__bounceInLeft">Gestion des Catégories</h1>

<?php if (isset($_SESSION['modification_reussi'])) : ?>
        <h3> <?php echo ($_SESSION['modification_reussi']) ?></h3>
        <!-- //on l'efface au rechargement de la page -->
    <?php unset($_SESSION['modification_reussi']);
    endif ?>

<form action="script/script_delete_cat.php" id="formulaire" method="post" enctype="multipart/form-data">
    <div class="tableoverflow">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary bg-opacity-25">ID</th>
                    <th class="bg-secondary bg-opacity-25">Libelle</th>
                    <th class="bg-secondary bg-opacity-25">Image</th>
                    <th class="bg-secondary bg-opacity-25">Active</th>
                    <th class="bg-secondary bg-opacity-25">Supprimer</th>
                    <th class="bg-secondary bg-opacity-25">Modifier</th>
                </tr>
            </thead>
            <?php foreach ($catgs as $catg) : ?>


                <tbody>
                    <tr>
                        <td class="bg-success bg-opacity-25"><?= $catg->id; ?></td>
                        <td class="bg-success bg-opacity-25"><?= $catg->libelle; ?></td>
                        <td class="bg-success bg-opacity-25"><img src="assets/images/category/<?= $catg->image; ?>" width="100" height="100" alt="" class="arrondie"></td>
                        <td class="bg-success bg-opacity-25"><?= $catg->active; ?></td>
                        <td class="bg-success bg-opacity-25"><a href="script/script_delete_cat.php?id=<?= $catg->id; ?>" <button type="submit" class="btn btn-warning">Supprimer</button>
                        </td>
                        <td class="bg-success bg-opacity-25"><a href="cat_form.php?id=<?= $catg->id; ?>" <button type="button" class="btn btn-success">Modifier</button>
                        </td>
                    </tr>

                </tbody>

            <?php
            endforeach;
            ?>




        </table>
    </div>
</form>



<?php
include_once "./Template/footer.php";
?>
</div>