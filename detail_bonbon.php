<?php
include_once("./header.php");
include_once("bdd.php");

if (!isset($_GET["id"])) {
    header("Location: confiseries.php");
    exit();
}

$id = $_GET["id"];
$confiserie = dbquery("SELECT * FROM confiseries WHERE id = ?", [$id]);
$c = $confiserie[0]; ?>

<a class="button is-rounded btn-retour" href="./detail_bonbon.php">
    ← Retour
</a>

<section class="detail-hero">
    <div class="columns is-vcentered px-5 py-4">
        <div class="column">
            <h1 class="title has-text-white is-2"><?php echo $c["nom"]; ?></h1>
            <p class="subtitle has-text-white is-4">
                <?php if (isset($stocks[$c["id"]])) {
                    echo $stocks[$c["id"]] . " dispo";
                } else {
                    echo "Rupture";
                }
                ; ?>
            </p>
        </div>
        <div class="column has-text-right">
            <h2 class="title has-text-white">Confiz</h2>
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
                <p><?php echo $c["description"]; ?></p>
                <div class="mt-4 is-flex is-justify-content-space-between is-align-items-center">
                    <p class="title is-5 has-text-weight-bold"><?php echo $c["prix"]; ?>€</p>
                    <a class="button is-rounded connexion">Acheter</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("./footer.php") ?>