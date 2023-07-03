-- Rechercher le prénom des employés et le numéro de la région de leur
-- département.

SELECT  `prenom`,`nodep` FROM `employe` ;

-- 2.***

-- Rechercher le numéro du département, le nom du département, le
-- nom des employés classés par numéro de département (renommer les
-- tables utilisées).


SELECT employe.nom, dept.nodept, dept.nom
FROM dept 
JOIN employe ON employe.nodep= dept.nodept
Order BY dept.nodept ASC;

-- 3.***

-- Rechercher le nom des employés du département Distribution. 

SELECT employe.nom AS "NOM",dept.nom AS "departement"
FROM dept
JOIN employe ON employe.nodep= dept.nodept
WHERE dept.nom="distribution" ;


-- 4.***
-- Rechercher le nom et le salaire des employés qui gagnent plus que
-- leur patron, et le nom et le salaire de leur patron.






-- 5.***
-- Rechercher le nom et le titre des employés qui ont le même titre que
-- Amartakaldire. 


SELECT  `nom`, `titre` FROM `employe` WHERE `titre` IN (SELECT `titre` FROM employe WHERE `nom`="Amartakaldire");

-- 6.***

-- Rechercher le nom, le salaire et le numéro de département des
-- employés qui gagnent plus qu'un seul employé du département 31,
-- classés par numéro de département et salaire. 

SELECT `nom`,`salaire`,`nodep` FROM `employe` WHERE `salaire`>ANY (SELECT `salaire`FROM employe WHERE`nodep`=31)  ;

-- 7.***

-- Rechercher le nom, le salaire et le numéro de département des
-- employés qui gagnent plus que tous les employés du département 31,
-- classés par numéro de département et salaire.


SELECT `nom`,`salaire`,`nodep` FROM `employe` WHERE `salaire`>ALL (SELECT `salaire`FROM employe WHERE`nodep`=31)  ;

-- 8.***

-- Rechercher le nom et le titre des employés du service 31 qui ont un
-- titre que l'on trouve dans le département 32.

SELECT `nom`, `titre` FROM `employe` WHERE `nodep`=31 and `titre` IN (SELECT `titre` FROM `employe` WHERE `nodep`=32);


-- 9.***
-- Rechercher le nom et le titre des employés du service 31 qui ont un
-- titre l'on ne trouve pas dans le département 32.

SELECT `nom`, `titre` FROM `employe` WHERE `nodep`=31 and `titre` NOT IN (SELECT `titre` FROM `employe` WHERE `nodep`=32);

-- 10.***
-- Rechercher le nom, le titre et le salaire des employés qui ont le même
-- titre et le même salaire que Fairent.

SELECT `nom`, `titre`,`salaire` 
FROM `employe` 
WHERE `titre`= (SELECT `titre` FROM `employe` WHERE `nom`="Fairent") 
AND `salaire` = (SELECT `salaire` FROM `employe` WHERE `nom`="Fairent");

-- 11.***

-- Rechercher le numéro de département, le nom du département, le
-- nom des employés, en affichant aussi les départements dans lesquels
-- il n'y a personne, classés par numéro de département.


SELECT `nodept`,dept.nom,employe.nom 
FROM `dept` 
Left JOIN employe ON employe.nodep= dept.nodept
Order BY `nodept` ASC;


-- 13.*** Calculer le nombre d'employés de chaque titre.

SELECT titre, count(*) AS Nbre 
FROM employe 
GROUP BY `titre`;


-- 14.*** Calculer la moyenne des salaires et leur somme, par région.

SELECT AVG(`salaire`) AS 'moyenne', SUM(`salaire`) AS 'somme',`nodep` FROM `employe` group by `nodep`;


-- 15.***Afficher les numéros des départements ayant au moins 3 employés.

SELECT `nodept`,count(*) AS "nbre employés"
FROM dept;

-- 16.*** Afficher les lettres qui sont l'initiale d'au moins trois employés.

SELECT `nodep` AS 'departement', COUNT(`nom`) AS 'Nbre'  FROM `employe` GROUP BY `nodep` HAVING COUNT(*) >=3;


-- 17.*** Rechercher le salaire maximum et le salaire minimum parmi tous les
-- salariés et l'écart entre les deux.



-- 18.*** Rechercher le nombre de titres différents.

SELECT DISTINCT COUNT(`titre`) AS 'différent' FROM `employe`;

-- 19.*** Pour chaque titre, compter le nombre d'employés possédant ce titre.

SELECT titre, COUNT(*) AS "Nbre"  FROM `employe` GROUP BY `titre`;

-- 20.*** Pour chaque nom de département, afficher le nom du département et
-- le nombre d'employés.

SELECT count(employe.nom) AS 'Nbr',`nodept` FROM `employe` JOIN dept ON employe.nodep=dept.nodept GROUP BY `nodept`;


-- 21.*** Rechercher les titres et la moyenne des salaires par titre dont la
-- moyenne est supérieure à la moyenne des salaires des Représentants.




-- 22.*** Rechercher le nombre de salaires renseignés et le nombre de taux de
-- commission renseignés.