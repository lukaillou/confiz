<?php include_once("./header.php") ?>

<main>
    <div class="hero">
        <div class="logo"><img src="./img/logo_confiz.png" alt="Logo Confiz"></div>
        <h1>Bienvenue sur le Site Confiz !</h1>
    </div>

    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]): ?>
        <a class="connexion" href="boutiques.php">Visiter le site</a>
    <?php else: ?>
        <a class="connexion" href="connexion.php">Se connecter</a>
    <?php endif; ?>

    <div class="qui-sommes-nous">
        <h2>Qui sommes-nous ?</h2>
        <p>Chez Confiz, nous croyons que commander des confiseries doit être aussi amusant que les déguster. Notre
            mission est de proposer une plateforme colorée, simple et conviviale permettant aux boutiques de
            retrouver facilement toutes leurs friandises préférées. 🍭✨</p>
    </div>
</main>

<script type="module" src="./js/script.js"></script>

<?php include_once("./footer.php") ?>