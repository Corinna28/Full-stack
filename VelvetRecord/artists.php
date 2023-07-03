<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>

<!-- 
Ici,

la connexion créée avec notre méthode connexionBase() est stockée dans la variable $db (qui récupère l'objet PDO renvoyé avec return $connexion;)
la requête SELECT en BDD est lancée grâce à la méthode query() de l'objet PDO et la réponse de la BDD est stocké dans la variable $requete
la méthode fetchAll() extrait les enregistrements trouvés et les renvoie sous forme de tableau d'objets, dans la variable $tableau
la méthode closeCursor(); libère la requête, pour pouvoir en lancer d'autres


La variable $tableau contient donc le résultat de notre requête, c'est-à-dire la liste des artistes trouvés.
Chaque artiste est représenté sous la forme d'un objet. -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Liste</title>
</head>
<body>
    <table>
    <tr>
            <th>ID</th>
            <th>Nom</th>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>

        <?php foreach ($tableau as $artist): ?>
        <tr>
            <td><?= $artist->artist_id ?></td>
            <td><?= $artist->artist_name ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="artist_detail.php?id=<?= $artist->artist_id ?>">Détail</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<!-- Dans ce code,

la variable $artist contient, à chaque itération de la boucle foreach, un objet correspondant à un enregistrement d'artiste en BDD
pour accéder aux propriétés d'un artiste (= colonnes de la table artist en BDD), il faut utiliser la syntaxe : objetBDD->nomdelacolonne ; ici, on essaie donc de lire l'ID, et le nom de notre artiste. -->


