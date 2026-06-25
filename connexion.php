<?php 
// nclut l'en-tête du site (menu, styles)
include_once("header.php") ?>

<main>
   <h2>Connexion</h2>
   <?php // Formulaire qui envoie les données en cache (POST) vers "check-login.php" ?>
        <form action="check-login.php" method="POST">

        <?php // Case obligatoire pour taper le pseudo ?>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="Ex : alice" required />
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="*********" required />
            <input type="submit" value="Se connecter" />
        </form>
    <p>Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a></p>
</main>

<?php 
// Inclut le pied de page du site
include_once("footer.php") ?>