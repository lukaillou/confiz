<?php include_once("./header.php") ?>

<main>
    <div class="hero">
        <div class = "logo"><img src="./img/logo_confiz.png" alt="Logo Confiz"></div>
        <h1>Bienvenue sur le Site Confiz !</h1>
    </div>

    <button class="connexion" id="ouvrirModal">Se connecter</button>

    <div class="qui-sommes-nous">
        <h2>Qui sommes-nous ?</h2>
        <p>Chez Confiz, nous croyons que commander des confiseries doit être aussi amusant que les déguster. Notre
            mission est de proposer une plateforme colorée, simple et conviviale permettant aux boutiques de
            retrouver facilement toutes leurs friandises préférées. 🍭✨</p>
    </div>

    <div id="modal" class="modal">
        <div class="contenu-modal">
            <span id="fermerModal">&times;</span>
            <h2>Veuillez vous connecter</h2>
            <div>
                <label for="username">Adresse Email&nbsp;:</label>
                <input type="text" id="username" name="username" placeholder="Ex : monadresse@gmail.com" />
            </div>
            <div>
                <label for="pass">Mot de passe (8 caractères minimum)&nbsp;:</label>
                <input type="password" id="pass" name="password" minlength="8" required placeholder="*********" />
            </div>
            <input type="submit" value="Se connecter" />
        </div>
    </div>
</main>

<script type="module" src="./js/script.js"></script>

<?php include_once("./footer.php") ?>