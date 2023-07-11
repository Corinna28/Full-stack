<?php
session_start();


// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao



include_once "Template/header.php";
include_once "Template/nav.php";
?>

<body>
<div class="container-fluid container-confi">
    <!-- Image promotion -->
    <img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />



    
</div>

    <?php
    include_once "./Template/footer.php";
    ?>
</body>