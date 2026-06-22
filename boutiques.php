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
</main>

<script src="./js/script.js"></script>
<?php include_once("./footer.php") ?>