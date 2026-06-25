<?php
// Charge l'en-tête (menu) et la base de données
include_once("./header.php");
include_once("bdd.php");

//  Si aucun ID de bonbon n'est fourni dans l'URL, on renvoie vers la liste complète
if (!isset($_GET["id"])) {
    header("Location: confiseries.php");
    exit();
}

// . Récupère l'ID depuis l'URL et va chercher les infos de CE bonbon précis
$id = $_GET["id"];
$confiserie = dbquery("SELECT * FROM confiseries WHERE id = ?", [$id]);
$c = $confiserie[0]; // Stocke le bonbon trouvé dans la variable $c
?>

<section class="detail-hero">
    <div class="columns is-vcentered px-5 py-4">
        <div class="column">
            <h1 class="title has-text-white is-2"><?php echo $c["nom"]; ?></h1>
            <p class="subtitle has-text-white is-4">
                <?php 
                // Affiche la quantité totale disponible ou "Rupture" si le stock est vide
                if (isset($stocks[$c["id"]])) {
                    echo $stocks[$c["id"]] . " dispo";
                } else {
                    echo "Rupture";
                }
                ; ?>
            </p>
        </div>
        <div class="column has-text-right">
            <h2 class="title has-text-white"><?php echo "Confiz"; ?></h2>
        </div>
    </div>
    <div class="detail-bande"></div>
</section>

<section class="detail-contenu">
    <div class="columns px-6 py-5">
        <div class="column is-4">
            <figure class="image">
                <img src="<?php echo $c['illustration']; ?>" alt="<?php echo $c['nom']; ?>" class="detail-img">
            </figure>
        </div>

        <div class="column is-8">
            <div class="box detail-desc">
                <h2 class="title is-4">Détails produit</h2>
                <p class="has-text-weight-bold mb-3"><?php echo $c["nom"]; ?></p>