<?php include_once("./header.php");
include_once("bdd.php");
?>

<main>
    <section class="section">
        <img src="./img/loraxmainlair.png" alt="" style="vertical-align: middle; height: 40px; margin-right: 12px;">
            Sélectionner une boutique
        </h1>
    </section>

    <div class="container">
        <div class="columns is-multiline is-centered">
            <?php foreach ($boutiques as $elem) { ?>
                <div class="column is-3">
                    <a href="./detail_boutiques.php?id=<?php echo $elem["id"]; ?>" class="card-boutique">
                        <div class="card">
                            <div class="card-header" style="background-color: #04a28dff;">
                                <p class="card-header-title has-text-white"><?php echo $elem["nom"]; ?></p>
                            </div>
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="./img/cartes/<?php echo $elem["ville"]; ?>.jpg"
                                        alt="<?php echo $elem["nom"]; ?>">
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>

    <section class="container mt-6">
        <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) { ?>

            <?php if ($_SESSION["user"]["role"] === "gerant" || $_SESSION["user"]["role"] === "admin") { ?>
                <?php if (count($boutiques_gerant) > 0) { ?>
                    <h1 class="title has-text-centered">Modifier une boutique</h1>
                    <div class="columns is-multiline">
                        <?php foreach ($boutiques_gerant as $elem) { ?>
                            <div class="column is-3">
                                <a href="./boutique_gerant.php?id=<?php echo $elem["id"]; ?>" class="card-boutique">
                                    <div class="card">
                                        <div class="card-header" style="background-color: #00b89c;">
                                            <p class="card-header-title has-text-white">
                                                <?php echo $elem["nom"]; ?>
                                            </p>
                                        </div>
                                        <div class="card-image">
                                            <figure class="image is-4by3">
                                                <img src="./img/placeholder.png" alt="<?php echo $elem["nom"]; ?>">
                                            </figure>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if ($_SESSION["user"]["role"] === "admin") { ?>
                <h1 class="title has-text-centered mt-6">Administration</h1>
                <div class="has-text-centered">
                    <a href="./ajouter_boutique.php" class="button is-rounded connexion">
                        + Ajouter une boutique
                    </a>
                </div>
            <?php } ?>

        <?php } ?>
    </section>


</main>

<script src="./js/script.js"></script>
<?php include_once("./footer.php") ?>