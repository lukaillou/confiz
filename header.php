<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confiz</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header>
        <img src="./img/header.png" alt="bannière" class="header-banner">
        <nav class="navbar">
            <a class="logo" href="./index.php"><img src="./img/logo_confiz.png" alt="logo Confiz"></a>
            <ul class="nav-links">
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./boutiques.php">Boutiques</a></li>
                <li><a href="./confiseries.php">Confiseries</a></li>
            </ul>

            <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]): ?>
                <span>
                    <?php echo $_SESSION["user"]["prenom"]; ?>
                </span>
                <a class="connexion" href="deconnexion.php">Se déconnecter</a>
            <?php else: ?>
                <a class="connexion" href="connexion.php">Se connecter</a>
            <?php endif; ?>
        </nav>
    </header>