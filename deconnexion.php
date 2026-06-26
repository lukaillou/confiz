<?php
session_start();
// Supprime la variable : l'utilisateur est connecté/ données stockés
unset($_SESSION["logged_in"]);
unset($_SESSION["user"]);
session_destroy();
header("Location: index.php");
exit();
?>