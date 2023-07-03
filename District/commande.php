<?php
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


<div class="container-fluid g-0">
    <!-- barre de recherche -->

    <!-- Image promotion -->
    <img class="pros" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />



    <div class="row gy-5">

        <div class="col-5">
            <form action="" id="formulaire" method="post">
                <fieldset>

                    <div class="form-group">
                        <label for="nom">Nom* :</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Veuillez saisir votre nom">
                        <small id="nomHelp" class="form-text text-muted">Ce champ est obligatoire.</small>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom* :</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Veuillez saisir votre Prénom">
                    </div>

                    <div class="form-group">
                        <label for="email">Email* :</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="dave.loper@afpa.com">
                        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail
                            avec quelqu'un d'autre.</small>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone* : </label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Veuillez indiquer votre numéro de télephone">
                        <small id="telephoneHelp" class="form-text text-muted">Ce champ est obligatoire.</small>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse* :</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Veuillez saisir votre adresse">
                    </div>

                </fieldset>


                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="Check1" name="" >
                    <label class="form-check-label" for="Check1"> * J'accepte le traitement informatique de
                        ce formulaire.</label>
                </div>
                <button type="submit" class="btn btn-outline-light">Envoyer</button>
                <button type="submit" class="btn btn-outline-light">Annuler</button>
                <hr>
            </form>
        </div>
    </div>
    <?php
    include_once "./Template/footer.php";
    ?>


</div>