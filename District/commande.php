<?php
// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

include_once "Template/header.php";
include_once "Template/nav.php";
?>


<div class="container-fluid g-0">
    <div class="col-7">

        <img src="assets/images/food/" width="400" height="400" alt="" class="arrondie">
        <h3>libelle</h3>
        <h4></h4>
        <h4>€</h4>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="exampleFormControlInput1">Price*</label>
            <input type="number" class="form-control" name="prix" placeholder="">
            <div class="form-group">
                <label for="nom">Nom et Prénom:</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Veuillez saisir votre nom et prénom" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="dave.loper@afpa.com" disabled>

            </div>
            <div class="form-group">
                <label for="telephone">Téléphone : </label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Veuillez indiquer votre numéro de télephone" disabled>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Veuillez saisir votre adresse" disabled>
            </div>
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-outline-light">Commander</button>
    <button type="submit" class="btn btn-outline-light">Annuler</button>
    <hr>
</div>

<?php
include_once "./Template/footer.php";
?>


</div>