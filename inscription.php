<?php
//  Démarre la session utilisateur et inclut la BDD
session_start();
include_once("db.php");

// Vérifie si le formulaire d'inscription a été soumis
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
    
    // Vérifie si le pseudo demandé existe déjà en base de données
    $existant = dbquery("SELECT * FROM utilisateurs WHERE username = ?", [$_POST["username"]]);
    
    if ($existant) {
        //  Si le pseudo est pris, on prépare un message d'erreur
        $erreur = "Ce nom d'utilisateur est déjà pris.";
    } else {
        // Si tout est bon, on crypte/hache le mot de passe pour la sécurité
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        // On insère le nouvel utilisateur dans la table (avec le rôle 'client' par défaut)
        $stmt = $PDO->prepare("INSERT INTO utilisateurs (username, password, email, role, nom, prenom, ddn) VALUES (?, ?, ?, 'client', ?, ?, ?)");
        $stmt->execute([
            $_POST["username"],
            $hash,
            $_POST["email"],
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["ddn"]
        ]);
        
        //  Inscription réussie : redirection vers la page de connexion
        header("Location: connexion.php");
        exit();
    }
}
?>

<?php 
//  Charge l'en-tête du site (menu et styles)
include_once("header.php") ?>

<main>
    <?php 
    //  Si le pseudo était déjà pris, on affiche le message d'erreur en rouge
    if (isset($erreur)) echo "<p style='color:red'>$erreur</p>"; ?>

    <form action="inscription.php"