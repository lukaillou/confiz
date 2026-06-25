<?php
// Charge l'en-tête (menu) et la base de données
include_once("./header.php");
include_once("bdd.php");

// SÉCURITÉ : Si aucun ID de boutique n'est donné dans l'URL, on renvoie vers la page des boutiques
if (!isset($_GET["id"])) {
    header("Location: boutiques.php");
    exit();
}

// Récupère l'ID dans l'URL et charge toutes les infos de CETTE boutique précise
$id = $_GET["id"];
$boutique = dbquery("SELECT * FROM boutiques WHERE id = ?", [$id]);
$b = $boutique[0]; // Stocke la boutique dans la variable $b
?>
<main style="background-image: url('./img/bluepaint.jpeg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; padding-bottom: 2rem;">

<section class="boutique-hero">
    <div class="columns px-5 py-4 is-vcentered">
        <div class="column has-text-centered">
            <h1 class="title has-text-white is-size-2"><?php echo $b["nom"]; ?> 🍭</h1>
        </div>
        <div class="column ">
            <span class="is-size-3">⭐⭐⭐☆☆</span>
        </div>
    </div>
</section>

<section class="boutique-contenu">
    <div class="columns px-4">
        
        <div class="column is-4 px-3">
            <figure class="image is-4by3">
                <img src="./img/cartes/<?php echo $b["ville"]; ?>.jpg" alt="Carte de  <?php echo $b["ville"]; ?>">
            </figure>
            <p class="has-text-black mt-2">Localisation | <?php echo $b["ville"]; ?></p>
        </div>

        <div class="column is-4 px-3">
            <figure class="image is-4by3">
                <img src="./img/placeholder.png" alt="Photo boutique">
            </figure>
            <p class="has-