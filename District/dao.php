<?php
// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD

// --------------------------------------------------------------Index.php

// Obtenir la liste des catégories

    function getCategorie(){
        $db = connexionBase();

        $sql = $db->query("SELECT categorie.libelle, categorie.image, SUM(`quantite`) 
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

        $plat = $db->query("SELECT `libelle`,`image`, SUM(`quantite`) 
        FROM `plat` 
        JOIN commande ON plat.id = commande.id_plat
         GROUP BY `libelle`ORDER BY SUM(`quantite`) DESC LIMIT 3;");
        $plats = $plat->fetchAll(PDO::FETCH_OBJ); 

        return $plats;
}

// --------------------------------------------------------------categorie.php

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


function getPlatall(){
    $db = connexionBase();

    $platall = $db->prepare("SELECT * FROM `plat` ");
    
    $platall->execute();
        $platalls= $platall->fetchAll(PDO::FETCH_OBJ); 

        return $platalls;

}