<?php include_once("./header.php");
include_once("bdd.php");
?>

<main>
    <section class="section">
        <h1 class="title has-text-centered">Sélectionner une boutique</h1>
    </section>

    <div class="container">
        <div class="columns is-multiline">



            <?php foreach ($boutiques as $elem) { ?>
                <div class="column is-3">
                    <a href="./detail_boutiques.php?id=<?php echo $elem["id"]; ?>" class="card-boutique">
                        <div class="card">
                            <div class="card-header" style="background-color: #00b89c;">
                                <p class="card-header-title has-text-white"><?php echo $elem["nom"]; ?></p>
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
    </div>

   <section class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-6">
        <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]): ?>
            <?php if ($_SESSION["user"]["role"] === "client"):
                if (count($boutiques_gerant) > 0) { ?>
                    <h1 class="title has-text-centered">Modifier une boutique</h1>
                    <?php foreach ($boutiques_gerant as $elem) { ?>
                        <a href="./boutique_gerant.php?id=<?php echo $elem["id"]; ?>">
                            <div class="button is-rounded connexion mt-6 p-6">
                                <h1 class="title has-text-centered">
                                    <?php echo $elem["nom"] ?>
                                </h1>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </section>


</main>

<script src="./js/script.js"></script>
<?php include_once("./footer.php") ?>