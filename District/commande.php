<?php
session_start();
// on importe le contenu du fichier "db.php"
include('dao.php');

// on exécute la méthode de connexion à notre BDD
$db = connexionBase();



// dans le [] nom indiquer aprés le lien internet

$id = intval($_GET['id']);

$platcom = getPlatbyID($id);


// requetes lancer via le dao

include_once "Template/header.php";
include_once "Template/nav.php";

?>

<form action="script/script_commande.php" id="formulaire" method="post">
    <fieldset>
        <div class="container-fluid g-0">
            <div class="col-12">

                <img src="assets/images/food/<?= $platcom->image; ?>" width="400" height="400" alt="" class="arrondie">
                <input type="hidden" required="required" name="libelle" value="<?= $platcom->libelle; ?>" /><h3><?= $platcom->libelle; ?></h3>
                <h4><?= $platcom->prix; ?>&nbsp; €</h4>

                <!-- &nbsp; L'espace insécable permet d'éviter qu'un mot, un ensemble de mots, un nombre, une date ou une ponctuation ne soient rejetés et isolés au début de la ligne suivante lorsque cela nuirait à la fluidité de la lecture. -->
            </div>

            <div class="row container-commande">
                <div class="col-5">
                    <label for="quantite">Quantité :</label>
                    <!-- id cacher pour avoir le id du plat concerne -->
                    <input id="id" name="id" value="<?= $platcom->id; ?>" type="hidden">
                    <!-- on recupere le prix pour effectuer le total -->
                    <input type="hidden" name="prix" value="<?= $platcom->prix; ?>">

                    <input type="number" required="required" class="form-control" name="quantite" value="1" placeholder="Quantité" min="1" max="20" />
                    <div class="form-group">
                        <label for="nom">Nom et Prénom:</label>
                        <input type="text" required="required"  class="form-control" id="nom_prenom" name="nom_prenom" value="fournier" placeholder="Veuillez saisir votre nom et prénom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" required="required" class="form-control" id="email" name="email" value="dave.loper@afpa.com" placeholder="dave.loper@afpa.com">

                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone : </label>
                        <input type="text" required="required" class="form-control" id="telephone" name="telephone" value="0322323232" placeholder="Veuillez indiquer votre numéro de télephone">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" required="required" class="form-control" id="adresse" name="adresse" value="12 jfdk" placeholder="Veuillez saisir votre adresse">
                    </div>
                </div>

            </div>
            <br>
            <input type="hidden" value=<?= $platcom->id; ?> />
            <button type="submit" class="btn btn-outline-light">Commander</button>
            <button type="submit" class="btn btn-outline-light">Annuler</button>
            <hr>
        </div>
    </fieldset>
</form>
<?php
include_once "./Template/footer.php";
?>