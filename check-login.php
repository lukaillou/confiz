<?php
session_start();
include_once("db.php");

// Vérifie si le formulaire est soumis
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $users = dbquery(
        "SELECT * FROM utilisateurs WHERE username = ?",
        [$_POST["username"]]
    );
// Si l'utilisateur existe
    if ($users) {
        $hash = $users[0]["password"];
// Vérifie si le mot de passe saisi est correct
        if (password_verify($_POST["password"], $hash)) {
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = $users[0];
            header("Location: index.php");
            exit();
        } else {
            // Mauvais mot de passe -> redirection
            header("Location: connexion.php");
            exit();
        }
    } else {
        // Utilisateur inconnu -> redirection
        header("Location: connexion.php");
        exit();
    }
}
?>