<?php include_once("./header.php");
include_once("bdd.php");

if (isset($_POST["supprimer_boutique"])) {
    $id = $_POST["boutique_id"];
    $stock_boutique = dbquery("SELECT * FROM stocks WHERE boutique_id = ?", [$id]);

    if (count($stock_boutique) === 0) {
        $stmt = $PDO->prepare("DELETE FROM boutiques WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: boutiques.php");
        exit();
    } else {
        $erreur_suppression = "Impossible de supprimer une boutique qui a encore des stocks.";
    }
}
?>

<main>
    <a class="button is-rounded btn-retour" href="./index.php">← Retour</a>

    <section class="section">
        <h1 class="title has-text-centered">Sélectionner une boutique</h1>
    </section>

    <?php if (isset($erreur_suppression)): ?>
        <div class="container">
            <p class="has-text-danger has-text-centered"><?php echo $erreur_suppression; ?></p>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="columns is-multiline is-centered">
            <?php foreach ($boutiques as $elem) { ?>
                <div class="column is-3">
                    <a href="./detail_boutiques.php?id=<?php echo $elem["id"]; ?>" class="card-boutique">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-header-title has-text-white"><?php echo $elem["nom"]; ?></p>
                            </div>
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="./img/boutiques/<?php echo $elem["id"]; ?>.png"
                                        alt="<?php echo $elem["nom"]; ?>">
                                </figure>
                            </div>
                            <?php if (isset($_SESSION["logged_in"]) && $_SESSION["user"]["role"] === "admin"): ?>
                                <footer class="card-footer p-2">
                                    <form method="POST" style="width:100%;">
                                        <input type="hidden" name="boutique_id" value="<?php echo $elem["id"]; ?>">
                                        <button type="submit" name="supprimer_boutique"
                                            class="button is-danger is-rounded is-small is-fullwidth"
                                            onclick="return confirm('Supprimer <?php echo $elem["nom"]; ?> ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </footer>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) { ?>
        <?php if ($_SESSION["user"]["role"] === "admin") { ?>
            <section class="container mt-6">
                <h1 class="title has-text-centered">Administration</h1>
                <div class="has-text-centered">
                    <a href="./ajouter_boutique.php" class="button is-rounded connexion">
                        + Ajouter une boutique
                    </a>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</main>

<script src="./js/script.js"></script>
<?php include_once("./footer.php") ?>