<?php
session_start();
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

include_once "Template/header.php";
include_once "Template/nav.php";
?>


<div class="container-fluid g-0">
    <!-- barre de recherche -->

    <!-- Image promotion -->
    <img class="pros" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />



    <div class="row gy-5 ">

        <div class="col-5 ">
            <form action="" id="formulaire" method="post">
                <fieldset>

                    <legend>
                        <p class="h1">Vos Coordonnées :</p>

                    </legend>

                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" required="required" class="form-control" id="nom" name="nom" placeholder="Veuillez saisir votre nom">
                                         </div>
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" required="required" class="form-control" id="prenom" name="prenom" placeholder="Veuillez saisir votre Prénom">
                    </div>

                    <div class="form-group">
                        <label for="mail">Email :</label>
                        <input type="text" required="required" class="form-control" id="mail" name="mail" placeholder="dave.loper@afpa.com">
                       
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone : </label>
                        <input type="text" required="required" class="form-control" id="phone" name="phone" placeholder="Veuillez indiquer votre numéro de télephone">
                        
                    </div>
                    <div class="form-group">
                        <label for="question">Votre question :</label>
                        <textarea class="form-control" required="required" id="question" name="question" rows="4"></textarea>
                    </div>

                </fieldset>

               
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