<?php
session_start();

// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();



include_once "Template/header.php";
include_once "Template/nav.php";

?>

<body>


<div class="card">
  <img src="jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
  <p><button>Add to Cart</button></p>
</div> 

  


  <?php
  include_once "./Template/footer.php";
  ?>
</body>