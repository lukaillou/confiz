<?php include_once("./header.php") ?>

<h1>Connexion</h1>

<a href="./index.php">Retour à l'accueil</a>

<button id="ouvrirModal">Ouvrir le modal</button>

<div id="modal" class="modal">
    <div class="contenu-modal">
        <span id="fermerModal">&times;</span>
        <div>
            <label for="username">Nom d'utilisateur&nbsp;:</label>
            <input type="text" id="username" name="username" />
        </div>

        <div>
            <label for="pass">Mot de passe (8 caractères minimum)&nbsp;:</label>
            <input type="password" id="pass" name="password" minlength="8" required />
        </div>

        <input type="submit" value="Se connecter" />
    </div>
</div>

<script src="./js/script.js"></script>

<?php include_once("./footer.php") ?>