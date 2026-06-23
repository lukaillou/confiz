<?php if (session_status() === PHP_SESSION_NONE)
    session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confiz</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <header class="header-wrapper">
        <img src="./img/header.png" alt="bannière" class="header-banner">
        <nav class="navbar header-nav" role="navigation">
            <div class="navbar-brand">
                <a class="navbar-item logo" href="./index.php">
                    <img src="./img/logo_confiz.png" alt="logo Confiz">
                </a>
            </div>

            <div class="navbar-menu is-active">
                <div class="navbar-start is-justify-content-space-around" style="flex: 1;">
                    <a class="navbar-item" href="./index.php">Accueil</a>
                    <a class="navbar-item" href="./boutiques.php">Boutiques</a>
                    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]): ?>
                        <?php if ($_SESSION["user"]["role"] === "admin"): ?>
                            <a class="navbar-item" href="admin.php">Administration</a>
                        <?php endif; ?>
                        <?php if ($_SESSION["user"]["role"] === "gerant" || $_SESSION["user"]["role"] === "admin"): ?>
                            <a class="navbar-item" href="gestion_stock.php">Gérer mes stocks</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="navbar-end">
                    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]): ?>
                        <div class="navbar-item">
                            <a class="button is-rounded connexion" href="deconnexion.php">
                                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                <?php echo $_SESSION["user"]["username"]; ?>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="navbar-item">
                            <a class="button is-rounded connexion" href="connexion.php">Se connecter</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>