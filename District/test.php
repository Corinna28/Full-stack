<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="user-widget">
    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) : ?>
      <a href="/logout.php">Se déconnecter</a>
    <?php else : ?>
      <a href="/login.php">Se connecter</a>
    <?php endif; ?>
  </div>
</body>

</html>