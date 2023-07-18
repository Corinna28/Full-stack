<?php
        // Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
    if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0) GOTO TrtRedirection;

    // Si la vérification est ok :
    require "../db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête DELETE sans injection SQL :
        $requete = $db->prepare("DELETE FROM `plat` WHERE `id`=?;");
        $requete->execute(array($_GET["id"]));
        $requete->execute();
        $requete->closeCursor();
    }
    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script/script_delete_plat.php)");
    }

    // Si OK: redirection 
    TrtRedirection:
    header("Location: /gestion_plats.php");
    exit;
