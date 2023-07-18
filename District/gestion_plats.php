<?php
session_start();


// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao
$platgests = getPlatgest();


include_once "Template/header.php";
include_once "Template/nav.php";
?>



<h1 class="animate__animated animate__bounceInLeft">Gestion des plats</h1>

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
                    <th class="bg-secondary bg-opacity-25">Description</th>
                    <th class="bg-secondary bg-opacity-25">Prix</th>
                    <th class="bg-secondary bg-opacity-25">Image</th>
                    <th class="bg-secondary bg-opacity-25">ID Catégorie</th>
                    <th class="bg-secondary bg-opacity-25">Active</th>
                    <th class="bg-secondary bg-opacity-25">Supprimer</th>
                    <th class="bg-secondary bg-opacity-25">Modifier</th>
                </tr>
            </thead>

            <?php foreach ($platgests as $platgest) : ?>

                <tbody>
                    <tr>
                        <td class="bg-success bg-opacity-25"><?= $platgest->id; ?></td>
                        <td class="bg-success bg-opacity-25"><?= $platgest->libelle; ?></td>
                        <td class="bg-success bg-opacity-25"><?= $platgest->description; ?></td>
                        <td class="bg-success bg-opacity-25"><?= $platgest->prix; ?></td>
                        <td class="bg-success bg-opacity-25"><img src="assets/images/food/<?= $platgest->image; ?>" width="100" height="100" alt="" class="arrondie"></td>
                        <td class="bg-success bg-opacity-25"><?= $platgest->id_categorie; ?></td>
                        <td class="bg-success bg-opacity-25"><?= $platgest->active; ?></td>
                        <td class="bg-success bg-opacity-25"><a href="script/script_delete_plat.php?id=<?= $platgest->id; ?>" <button type="button" class="btn btn-warning">Supprimer</button></td>
                        <td class="bg-success bg-opacity-25"><a href="plat_form.php?id=<?= $platgest->id; ?>" <button type="submit" class="btn btn-success">Modifier</button></td>

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