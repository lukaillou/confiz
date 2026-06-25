<?php
// 1. Démarre ou récupère la session de l'utilisateur en incluant fichier de connexion à la bdd
session_start();
include_once("db.php");

// Vérifie si connexion a bien été envoyé (identifiant et mot de passe)
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Cherche l'utilisateur dans la bdd  via son pseudo
    $users = dbquery(
        "SELECT * FROM utilisateurs WHERE username = ?",
        [$_POST["username"]]
    );

    // Si l'utilisateur existe bien dans la base : Récupère le mot de passe sécurisé (hash) enregistré en BDD
    if ($users) {
        $hash = $users[0]["password"];

        //  Vérifie si le mot de passe tapé correspond au mot de passe crypté
        if (password_verify($_POST["password"], $hash)) {
            // Connexion réussie : on active la session et on stocke ses infos
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = $users[0];
            // Redirection d'accueil et arrête le script
            header("Location: index.php");
            exit();
        } else {
            //  SI Mauvais mot de passe : connexion
            header("Location: connexion.php");
            exit();
        }
    } else {
        // SINON Pseudo inconnu : connexion
        header("Location: connexion.php");
        exit();
    }
}
?>