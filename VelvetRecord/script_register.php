<?php    
// Si la vérification des données est ok :
    include('db.php');
    $db = connexionBase();
// Vérification des données reçues du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des valeurs :
    // $user_id = (isset($_POST['user_id']) && $_POST['user_id'] != "") ? $_POST['user_id'] : Null;
    $username = (isset($_POST['username']) && $_POST['username'] != "") ? $_POST['username'] : Null;
    $password = (isset($_POST['password']) && $_POST['password'] != "") ? $_POST['password'] : Null;
    $confirmation = (isset($_POST['confirmation']) && $_POST['confirmation'] != "") ? $_POST['confirmation'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($username == Null || $password == Null || $confirmation == Null) {
        header("Location: register.php?id=" . $user_id);
    }


    // Insertion des données dans la base de données
    try {
        $requete = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

        $requete->bindValue(":username", $username, PDO::PARAM_STR);
        $requete->bindValue(":password", $password, PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();
    } catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_register.php)");
    }
    // Redirection vers la page des disques
    header("Location: index.php");
    exit();
}
