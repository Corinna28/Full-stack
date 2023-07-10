<?php
// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD

// --------------------------------------------------------------Index.php

// Obtenir la liste des catégories

    function getCategorie(){
        $db = connexionBase();

        $sql = $db->query("SELECT categorie.id, categorie.libelle, categorie.image, SUM(`quantite`) 
                            FROM categorie 
                        JOIN plat ON categorie.id=plat.id_categorie 
                        JOIN commande On plat.id=commande.id_plat
                        GROUP BY categorie.libelle 
                        ORDER BY SUM(`quantite`) DESC LIMIT 6; ");
        $categories = $sql->fetchAll(PDO::FETCH_OBJ); 

        return $categories;
    }

    // la fonction d’agrégation SUM() permet de calculer la somme totale d’une colonne contenant des valeurs numériques.

// La clause LIMIT est à utiliser dans une requête SQL pour spécifier le nombre 
// maximum de résultats que l’ont souhaite obtenir. Cette clause est souvent associé à un OFFSET, c’est-à-dire effectuer un décalage sur le jeu de résultat.
//  Ces 2 clauses permettent par exemple d’effectuer des système de pagination (exemple : récupérer les 10 articles de la page 4).


// Obtenir la liste des plats les plus vendus


function getPlat(){
    $db = connexionBase();

        $plat = $db->query("SELECT `id_categorie`, `libelle`,`image`, SUM(`quantite`) 
        FROM `plat` 
        JOIN commande ON plat.id = commande.id_plat
         GROUP BY `libelle`ORDER BY SUM(`quantite`) DESC LIMIT 3;");
        $plats = $plat->fetchAll(PDO::FETCH_OBJ); 

        return $plats;
}

// --------------------------------------------------------------categorie.php
// cette fonction recupere les categories page categorie
function getCatdiver($limit, $offset){
    $db = connexionBase();

        $catdiver = $db->prepare("SELECT categorie.libelle, categorie.image, categorie.active, categorie.id  FROM categorie WHERE categorie.active= 'Yes' LIMIT :limit OFFSET :offset;");
       
    //    variable pour la pagination
    
        $catdiver->bindValue(':limit', $limit, pdo::PARAM_INT);
        $catdiver->bindValue(':offset', $offset, pdo::PARAM_INT);
        $catdiver->execute();
        $catdivers = $catdiver->fetchAll(PDO::FETCH_OBJ); 

        return $catdivers;
}



// ----------------------------------------------------plat/catégorie.php
// cette fonction recupere les plats par catégorie

function getPlatcat($limit, $offset, $id){
    $db = connexionBase();

        $platCat = $db->prepare("SELECT plat.*
        FROM `plat` 
        JOIN categorie ON categorie.id=plat.id_categorie
        WHERE plat.id_categorie = :id
        LIMIT :limit OFFSET :offset;");
        //    variable pour la pagination
    
        $platCat->bindValue(':limit', $limit, pdo::PARAM_INT);
        $platCat->bindValue(':offset', $offset, pdo::PARAM_INT);
        $platCat->bindValue(':id', $id, pdo::PARAM_INT);
        $platCat->execute();
        $platCats = $platCat->fetchAll(PDO::FETCH_OBJ); 

        return $platCats;
}



// -----------------------------------------------------------------plat.php
// cette fonction recupere tout les plats page plat

function getPlatall(){
    $db = connexionBase();

    $platall = $db->prepare("SELECT * FROM `plat`");
    
    $platall->execute();
        $platalls = $platall->fetchAll(PDO::FETCH_OBJ); 

        return $platalls;

}


// -----------------------------------------------------------------commandes.php

//cette fonction est utilisée pour retrouver le plat qui a été commandé
function getPlatbyID($id){
    $db= connexionBase();

    $commande = $db->prepare("SELECT * FROM `plat` WHERE `id`= :id;");
    $commande->bindValue(':id', $id, pdo::PARAM_INT);
    $commande->execute();
    return $commande->fetch(PDO::FETCH_OBJ);
}

// cette fonction est pour insérée dans la base de données la commande passe en direct

function getCompasse($quantite, $nom_prenom, $email, $telephone, $adresse){
    $db= connexionBase();

    $commpasse = $db->prepare("INSERT INTO `commande`( `quantite`, `total`, `date_commande`,`nom_client`, `telephone_client`, `email_client`, `adresse_client`) VALUES ('[value-3]','[value-4]','[value-5]','[value-7]','[value-8]','[value-9]','[value-10]')");
    $commpasse->bindValue(":quantite", $quantite,pdo::PARAM_INT);
    // paramint entier le str pour le reste
    $commpasse->bindValue(":nom_prenom", $nom_prenom,pdo::PARAM_STR);
    $commpasse->bindValue(":email", $email,pdo::PARAM_STR);
    $commpasse->bindValue(":telephone", $telephone, pdo::PARAM_STR);
    $commpasse->bindValue(":adresse", $adresse, pdo::PARAM_STR);
      
    $commpasse->execute();
    return $commpasse->fetch(PDO::FETCH_OBJ);
}


// -----------------------------------------------------------------login.php

function getIdentifiants($identifiant, $password){
       $db = connexionBase();

    $username = $db->prepare("SELECT * FROM utilisateur WHERE email= :identifiant;");

    $username->bindValue(":identifiant", $identifiant, PDO::PARAM_STR);
    $username->execute();
    
    $user = $username->fetch(pdo::FETCH_ASSOC);
    if ($user['password'] == $password) {
        // if ($user && password_verify($password, $user['password'])){
        return $user;
    }

    return null;
}

