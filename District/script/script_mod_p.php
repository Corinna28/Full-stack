<?php
session_start();

// on importe le contenu du fichier "db.php"
include('../dao.php');

$id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
$libelle = (isset($_POST['libelle']) && $_POST['libelle'] != "") ? $_POST['libelle'] : Null;
$description = (isset($_POST['description']) && $_POST['description'] != "") ? $_POST['description'] : Null;
$prix = (isset($_POST['prix']) && $_POST['prix'] != "") ? $_POST['prix'] : Null;
$categorie = (isset($_POST['categorie']) && $_POST['categorie'] != "") ? $_POST['categorie'] : Null;
$image = (isset($_POST['image']) && $_POST['image'] != "") ? $_POST['image'] : Null;
$active = (isset($_POST['active']) && $_POST['active'] != "") ? $_POST['active'] : Null;

if ($id == Null || $libelle == Null || $description == Null || $prix== Null || $categorie == Null || $image == Null || $active == Null) {
    
}

// Gestion de l'upload de l'image
$filename = null;
if (isset($_FILES["image"]) ) {
    // && $_FILES["image"]["error"] == 0
    $allowedExtensions = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!array_key_exists($ext, $allowedExtensions)) {
        die("Erreur : Veuillez sélectionner un format de fichier valide.");
    }

    $maxsize = 5 * 1024 * 1024;
    if ($filesize > $maxsize) {
        die("Erreur: La taille du fichier dépasse la limite autorisée.");
    }

    if (in_array($filetype, $allowedExtensions)) {
// var_dump($_FILES);

        $image = $filename;
        $targetPath = "../assets/images/category/" . $filename;
        if (file_exists($targetPath)) {
            echo $filename . " Ce fichier existe déjà.";
        } else {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);
            echo "Bravo votre fichier a été téléchargé avec succès.";
        }
    } else {
        echo "Erreur: Problème lors du téléchargement du fichier. Veuillez réessayer.";
    }
} else {
    echo "Erreur: " . $_FILES["image"]["error"];
}

try {
    $db = connexionBase();
    // Construction de la requête UPDATE sans injection SQL :
    $requete = $db->prepare("UPDATE plat SET id=:id,libelle=:libelle,description=:description,prix=:prix,image=:image,id_categorie=:categorie,active=:active WHERE id=:id;");
    // Association des valeurs aux paramètres via bindValue() 
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->bindValue(":libelle", $libelle, PDO::PARAM_STR);
    $requete->bindValue(":description", $description, PDO::PARAM_STR);
    $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
    $requete->bindValue(":categorie", $categorie, PDO::PARAM_STR);
    $requete->bindValue(":image", $image, PDO::PARAM_STR);
    $requete->bindValue(":active", $active, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
    echo "Erreur : " . $e . "<br>";
    die("Fin du script (script/script_mod_p.php)");
}


// Si OK: redirection avec un message qui peut être récupéré sur la page d'accueil
$_SESSION['modification_reussi']='Votre modification a bien été prise en compte';
header("Location: /gestion_plats.php");
exit;