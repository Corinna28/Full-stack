<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <img src="assets/images/the_district_brand/pinterest_board_photo.png" alt="" width="100" height="100" class="rounded-circle">


    <?php
    if (isset($_SESSION['user'])) {
    ?>
      <span class="bonjour"> <?= "Bonjour " . $_SESSION['user']; ?></span>
    <?php
    }
    ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorie.php">Catégorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="plat.php">Plats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

        
   
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gestion</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="gestion_cat.php">Catégorie</a></li>
              <li><a class="dropdown-item" href="gestion_plats.php">Plats</a></li>
            </ul>
          </li>
       

        <!-- menu deroulant inscription/connexion -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Identification</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="register.php">S'enregistrer</a></li>
            <li><a class="dropdown-item" href="login.php">Connexion</a></li>
            <li><a class="dropdown-item" href="logout.php">Deconnexion</a></li>

          </ul>
        </li>

        <form action="recherche.php" role="search">
          <input class="form-control me-2" type="search" name="recherche" placeholder="Recherche" aria-label="Search">


          <button class="btn btn-outline-secondary" type="submit">Recherche</button>
        </form>

      </ul>
    </div>
  </div>
</nav>