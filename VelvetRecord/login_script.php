<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->query("SELECT user_id, username, password FROM users WHERE 1");

// on récupère tous les résultats trouvés dans une variable
$users = $requete->fetchAll(PDO::FETCH_ASSOC);
// on clôt la requête en BDD
$requete->closeCursor();


// Validation du formulaire
if (isset($_POST['username']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['username'] === $_POST['username'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'username' => $user['username'],
            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['username'],
                $_POST['password']
            );
        }
    }
}



header('Location: index.php');
        exit;



?>