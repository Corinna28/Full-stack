<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disc_New</title>

</head>

<div class="container">
 
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand">S'Inscrire</a>
    </nav>
    <link rel="stylesheet" href="Assets/css/style.css">
    <br>
    <br>
    <br>
    <form method="post" action="script_register.php">
        <div class="input-group">
            <label>Username : </label>
            <input type="text" name="username" value="">
        </div>
        <br>
        <div class="input-group">
            <label>Password : </label>
            <input type="password" name="password">
        </div>
        <br>
        <div class="input-group">
            <label>Confirmation Password : </label>
            <input type="password" name="confirmation">
        </div>
        <br>
        <button type="submit" class="btn btn-outline-primary">S'inscrire</button>
        <a href="index.php" class="btn btn-outline-primary">Retour</a>
    </form>
</div>

</html>