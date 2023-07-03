<?php    
// Connexion à la base de données
    require('db.php');
    $db = connexionBase();

// Vérification des données reçues du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $artist = isset($_POST['artist']) ? $_POST['artist'] : null;
    $year = isset($_POST['year']) ? $_POST['year'] : null;
    $genre = isset($_POST['genre']) ? $_POST['genre'] : null;
    $label = isset($_POST['label']) ? $_POST['label'] : null;
    $price = isset($_POST['prix']) ? $_POST['prix'] : null;


    // Gestion de l'upload de l'image
    $picture = null;
    if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] == 0) {
        $allowedExtensions = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["picture"]["name"];
        $filetype = $_FILES["picture"]["type"];
        $filesize = $_FILES["picture"]["size"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowedExtensions)) {
            die("Erreur : Veuillez sélectionner un format de fichier valide.");
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Erreur: La taille du fichier dépasse la limite autorisée.");
        }

        if (in_array($filetype, $allowedExtensions)) {
            $picture = $filename;
            $targetPath = "./Assets/images/" . $filename;
            if (file_exists($targetPath)) {
                echo $filename . " Ce fichier existe déjà.";
            } else {
                move_uploaded_file($_FILES["picture"]["tmp_name"], $targetPath);
                echo "Bravo votre fichier a été téléchargé avec succès.";
            }
        } else {
            echo "Erreur: Problème lors du téléchargement du fichier. Veuillez réessayer.";
        }
    } else {
        echo "Erreur: " . $_FILES["picture"]["error"];
    }

    // Insertion des données dans la base de données
    try {
        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id)
        VALUES (:title, :year, :picture, :label, :genre, :price, :artist)");

        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_INT);
        $requete->bindValue(":picture", $picture, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_INT);
        $requete->bindValue(":artist", $artist, PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();
    } catch (Exception $e) {
        // var_dump($requete->queryString);
        // var_dump($requete->errorInfo());
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_ajout.php)");
    }

    // Redirection vers la page des disques
    header("Location: index.php");
    exit();
}

?>