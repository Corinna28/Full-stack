-- Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )

SELECT `id_plat`, `total`, `date_commande`, `nom_client`, `telephone_client`, `email_client`, `adresse_client` FROM `commande` ;


-- Afficher la liste des plats en spécifiant la catégorie

SELECT plat.libelle, categorie.libelle
FROM `plat`
JOIN categorie ON categorie.id=plat.id_categorie;


-- Afficher les catégories et le nombre de plats actifs dans chaque catégorie



-- Liste des plats les plus vendus par ordre décroissant

SELECT plat.libelle,SUM(commande.quantite) AS '+ vendu'
FROM `plat` 
JOIN commande ON commande.id=plat.id
GROUP BY plat.libelle 
order by commande.quantite DESC ;

-- Le plat le plus rémunérateur

SELECT plat.libelle, MAX(commande.quantite*plat.prix) AS '+ rémunérateur'FROM `plat` JOIN commande ON commande.id=plat.id ;


-- Liste des clients et le chiffre d'affaire généré par client (par ordre décroissant)



-- Ecrire des requêtes de modification de la base de données

-- Ecrivez une requête permettant de supprimer les plats non actif de la base de données

DELETE FROM `plat` WHERE `active`='No';

-- Ecrivez une requête permettant de supprimer les commandes avec le statut livré

DELETE FROM `commande` WHERE `etat`='livrée';

-- Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.

INSERT INTO `categorie`(`libelle`, `image`, `active`) VALUES ('NEW','NEW','No');

INSERT INTO `plat`(`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) VALUES ('New','New',0,'rer.jpg','16','No');

-- Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'

UPDATE `plat` 
SET prix = prix * 1.1 
WHERE `id_categorie`= (SELECT id from categorie WHERE `libelle`= 'Pizza');
