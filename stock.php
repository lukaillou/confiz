<?php
session_start();
include_once("./header.php");
include_once("bdd.php");

if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] !== "gerant") {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION["user"]["id"];

$boutiques = dbquery("SELECT * FROM boutiques WHERE utilisateur_id = ?", [$user_id]);
if (empty($boutiques)) die("Aucune boutique associée à votre compte.");
$boutique = $boutiques[0];

$stocks = dbquery("
    SELECT s.id AS stock_id, c.nom, c.type, c.prix, s.quantite, s.date_de_modification
    FROM stocks s
    JOIN confiseries c ON s.confiserie_id = c.id
    WHERE s.boutique_id = ?
    ORDER BY c.nom
", [$boutique["id"]]);
?>

<main class="main-boutique">
    <section class="section">
        <div class="container is-fluid">
            <h1 class="title">📦 Gestion des stocks — <?php echo $boutique["nom"]; ?></h1>
            <a href="stock_ajouter.php" class="button is-rounded voir-produit mb-4">+ Ajouter une confiserie</a>

            <?php if (isset($_GET["success"])): ?>
                <div class="notification is-success is-light">
                    <?php echo htmlspecialchars($_GET["success"]); ?>
                </div>
            <?php endif; ?>

            <?php if (empty($stocks)): ?>
                <p class="has-text-grey">Aucune confiserie en stock pour le moment.</p>
            <?php else: ?>
                <table class="table is-fullwidth is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>Confiserie</th>
                            <th>Type</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th>Dernière mise à jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stocks as $s): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($s["nom"]); ?></td>
                            <td><?php echo htmlspecialchars($s["type"]); ?></td>
                            <td><?php echo number_format($s["prix"], 2); ?> €</td>
                            <td><?php echo $s["quantite"]; ?></td>
                            <td><?php echo $s["date_de_modification"]; ?></td>
                            <td>
                                <a href="stock_supprimer.php?stock_id=<?php echo $s["stock_id"]; ?>"
                                   class="button is-small is-danger is-rounded"
                                   onclick="return confirm('Supprimer cette confiserie du stock ?')">
                                    🗑 Supprimer
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include_once("./footer.php"); ?>