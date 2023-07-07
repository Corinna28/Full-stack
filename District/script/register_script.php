<?php

// on importe le contenu du fichier "db.php"
require('../dao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des valeurs :
 
    $nom_prenom = (isset($_POST['nom_prenom']) && $_POST['nom_prenom'] != "") ? $_POST['nom_prenom'] : Null;
    $email = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
    $password = (isset($_POST['password']) && $_POST['password'] != "") ? $_POST['password'] : Null;
    $confirmation = (isset($_POST['confirmation']) && $_POST['confirmation'] != "") ? $_POST['confirmation'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($nom_prenom == Null || $email == Null || $password == Null || $confirmation == Null) {
        header("Location: register.php?id=" . $user_id);
    }
}
  // Insertion des données dans la base de données
  try {
    $requete = $db->prepare("INSERT INTO `utilisateur`(`nom_prenom`, `email`, `password`) VALUES ('[value-2]','[value-3]','[value-4]')");

    $requete->bindValue(":nom_prenom", $nom_prenom, PDO::PARAM_STR);
    $requete->bindValue(":email", $email, PDO::PARAM_STR);
    $requete->bindValue(":password", $password, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
   
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_register.php)");
}
// Redirection vers la page des disques
header("Location: index.php");
exit();

