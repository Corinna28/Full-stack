<?php
function ConnexionBase() {

    try 
    {
        $connexion = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Jade1902');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;

    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script"); 
    }
}
?>



<!-- Pour afficher nos données sur une page, une première étape s'impose donc : notre connexion à la base de données !

Pour cela, nous allons créer un fichier db.php, reprenant le code de connexion vu précédemment, préparé dans une méthode :

Le fichier db.php contient maintenant une méthode de connexion, ConnexionBase(), que nous allons pouvoir utiliser pour lancer nos requêtes. -->