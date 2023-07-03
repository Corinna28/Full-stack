-- Puis vous réaliserez les exercices suivants:

-- Pour l'instruction insert:

--     Ajouter trois employés dans la base de données avec les données de votre choix.

INSERT INTO `employe`(`noemp`, `nom`, `prenom`, `dateemb`,`titre`, `nodep`, `salaire`, `tauxcom`) VALUES(26,'Bibandum','Patapouf','2023-06-08','secrétaire','32','13000','10.00');

INSERT INTO `employe`(`noemp`, `nom`, `prenom`, `dateemb`,  `titre`, `nodep`, `salaire`, `tauxcom`) VALUES(27,'Miss','Pognon','2023-06-08','secrétaire','32','13000','10.00');

INSERT INTO `employe`(`noemp`, `nom`, `prenom`, `dateemb`,  `titre`, `nodep`, `salaire`, `tauxcom`) VALUES(28,'Mr','Propre','2023-06-08','représentant','33','13000','10.00');

    -- Ajouter un département

INSERT INTO `dept`(`nodept`, `nom`, `noregion`) VALUES (53,'SAV',5);

    -- Utilisez une requête select pour vérifier l'insertion.

    SELECT `noemp`, `nom`, `prenom`, `dateemb`, `nosup`, `titre`, `nodep`, `salaire`, `tauxcom` FROM `employe` WHERE `noemp`=28;

-- Pour l'instruction update:

    -- Augmenter de 10% le salaire de l'employe 17

    UPDATE `employe` SET `salaire`=`salaire` * 1.2 WHERE `noemp`=17;

    -- Changer le nom du département 45 en 'Logistique'

UPDATE `dept` SET `nom`='Logistique' WHERE `nodept`=45; 
-- Pour l'instruction delete:

    -- Supprimer le dernier des employés que vous avez insérés précédemment.


DELETE FROM `employe` WHERE `noemp`=(SELECT MAX(`noemp`) FROM `employe`);