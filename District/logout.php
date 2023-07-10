<?php

// cela demarre la session
session_start();

// session_unset — Détruit toutes les variables d'une session
session_unset();

// session_destroy() détruit toutes les données associées à la session courante. Cette fonction ne détruit pas les variables globales associées à la session, de même, elle ne détruit pas le cookie de session. 
// Pour accéder à nouveau aux variables de session, la fonction session_start() doit être appelée de nouveau.
session_destroy();

header("Location: ../index.php");
exit;
?>
