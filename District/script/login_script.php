<?php
session_start();



// on importe le contenu du fichier "db.php"
require('../dao.php');

// on exécute la méthode de connexion à notre BDD
// $db = connexionBase();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $identifiant = $_POST['username'];
    $password = $_POST['password'];
    $user = getIdentifiants($identifiant, $password);
    // stocker les informations de l'utilisateur
    if ($user) {
        $_SESSION['user'] = $user['nom_prenom'];
        header('Location: /index.php');
        exit;
    } else {

        $_SESSION['Identifiant_incorrect'] = "Votre identifiant est incorrect";
        header('Location: /login.php');
        exit;
    }
} else {
    header('Location: /login.php');
    exit;
}
