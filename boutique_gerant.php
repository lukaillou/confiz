<?php
include_once("./header.php");
include_once("bdd.php");

if (!isset($_SESSION["logged_in"]) || !in_array($_SESSION["user"]["role"], ["gerant", "admin"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET["id"])) {
    header("Location: boutiques.php");
    exit();
}

$id = $_GET["id"];
$boutique = dbquery("SELECT * FROM boutiques WHERE id = ?", [$id]);
$b = $boutique[0];

if ($_SESSION["user"]["role"] === "gerant" && $b["utilisateur_id"] != $_SESSION["user"]["id"]) {
    header("Location: boutiques.php");
    exit();
}

$confiseries_boutique = dbquery("
    SELECT confiseries.*, stocks.quantite, stocks.id as stock_id
    FROM confiseries
    JOIN stocks ON confiseries.id = stocks.confiserie_id
    WHERE stocks.boutique_id = ?
", [$id]);

if (isset($_POST["ajouter"])) {
    $stmt = $PDO->prepare("INSERT INTO stocks (quantite, date_de_modification, boutique_id, confiserie_id) VALUES (?, NOW(), ?, ?)");
    $stmt->execute([$_POST["quantite"], $id, $_POST["confiserie_id"]]);
    header("Location: boutique_gerant.php?id=$id");
    exit();
}

if (isset($_POST["supprimer"])) {
    $stmt = $PDO->prepare("DELETE FROM stocks WHERE id = ?");
    $stmt->execute([$_POST["stock_id"]]);
    header("Location: boutique_gerant.php?id=$id");
    exit();
}
?>

<main>
    <a class="button is-rounded btn-retour" href="./detail_boutiques.php?id=<?php echo $id?>">
        ← Retour
    </a>
    <section class="section">
        <h1 class="title has-text-centered">Gestion de <?php echo $b["nom"]; ?></h1>
    </section>

    <div class="container">

        <h2 class="title is-4">Confiseries en stock</h2>
        <?php if (count($confiseries_boutique) > 0) { ?>
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($confiseries_boutique as $c) { ?>
                        <tr>
                            <td><?php echo $c["nom"]; ?></td>
                            <td><?php echo $c["type"]; ?></td>
                            <td><?php echo $c["prix"]; ?>€</td>
                            <td><?php echo $c["quantite"]; ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="stock_id" value="<?php echo $c["stock_id"]; ?>">
                                    <button type="submit" name="supprimer" class="button is-danger is-small is-rounded">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p class="has-text-grey">Aucune confiserie en stock.</p>
        <?php } ?>

        <h2 class="title is-4 mt-6">➕ Ajouter une confiserie</h2>
        <div class="box" style="max-width: 500px;">
            <form method="POST">
                <div class="field">
                    <label class="label">Confiserie</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="confiserie_id" required>
                                <?php foreach ($confiseries as $c) { ?>
                                    <option value="<?php echo $c["id"]; ?>"><?php echo $c["nom"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Quantité</label>
                    <div class="control">
                        <input class="input" type="number" name="quantite" min="1" required placeholder="Ex : 50">
                    </div>
                </div>
                <button type="submit" name="ajouter" class="button is-rounded connexion is-fullwidth mt-3">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
</main>

<?php include_once("./footer.php") ?>