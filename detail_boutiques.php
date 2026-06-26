<?php
include_once("./header.php");
include_once("bdd.php");

if (!isset($_GET["id"])) {
    header("Location: boutiques.php");
    exit();
}

$id = $_GET["id"];
$boutique = dbquery("SELECT * FROM boutiques WHERE id = ?", [$id]);
$b = $boutique[0];
?>

<main
    style="background-image: url('./img/bluepaint.jpeg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; padding-bottom: 2rem;">

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
    <a class="button is-rounded btn-retour" href="./boutiques.php">
        ← Retour
    </a>
    <section class="boutique-hero">
        <div class="columns px-5 py-4 is-vcentered">
            <div class="column has-text-centered">
                <h1 class="title has-text-white is-size-2"><?php echo $b["nom"]; ?> 🍭</h1>
            </div>
            <div class="column">
                <span class="is-size-3">⭐⭐⭐☆☆</span>
            </div>
        </div>
    </section>

    <section class="boutique-contenu">
        <div class="columns px-4">
            <div class="column is-4 px-3">
                <figure class="image is-4by3">
                    <img src="./img/cartes/<?php echo $b["ville"]; ?>.jpg" alt="Carte de <?php echo $b["ville"]; ?>">
                </figure>
                <p class="has-text-white mt-2">Localisation | <?php echo $b["ville"]; ?></p>
            </div>

            <div class="column is-4 px-3">
                <figure class="image is-4by3">
<<<<<<< Updated upstream
                    <img src="./img/boutiques/<?php echo $b["id"]; ?>.png" alt="Photo boutique <?php echo $b["nom"]; ?>">
=======
                    <img src="./img/placeholder.png" alt="Photo boutique">
>>>>>>> Stashed changes
                </figure>
                <p class="has-text-white mt-2">Photo boutique</p>
            </div>

            <div class="column is-4 px-3">
                <div class="box boutique-desc">
                    <p>Bienvenue chez <?php echo $b["nom"]; ?>, une boutique gourmande où les couleurs, les saveurs et
                        la nostalgie se mélangent comme dans une pluie de bonbons 🍬</p>
                    <p class="mt-3">Entre douceurs rétro, confiseries originales et univers chaleureux,
                        <?php echo $b["nom"]; ?> transforme chaque visite en petite parenthèse sucrée.
                    </p>
                    <a href="./confiseries.php?boutique_id=<?php echo $b["id"]; ?>"
                        class="button is-rounded mt-5 voir-produit">Voir produit</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section horaires-section">
        <div class="container is-fluid">
            <h2 class="title has-text-centered has-text-white mb-5">🕐 Horaires d'ouverture</h2>
            <div class="columns is-centered">
                <div class="column is-6">
                    <table class="table is-fullwidth is-striped is-hoverable horaires-table">
                        <tbody>
                            <tr>
                                <td><strong>Lundi</strong></td>
                                <td class="has-text-right">10h00 - 19h00</td>
                            </tr>
                            <tr>
                                <td><strong>Mardi</strong></td>
                                <td class="has-text-right">10h00 - 19h00</td>
                            </tr>
                            <tr>
                                <td><strong>Mercredi</strong></td>
                                <td class="has-text-right">10h00 - 19h00</td>
                            </tr>
                            <tr>
                                <td><strong>Jeudi</strong></td>
                                <td class="has-text-right">10h00 - 19h00</td>
                            </tr>
                            <tr>
                                <td><strong>Vendredi</strong></td>
                                <td class="has-text-right">10h00 - 20h00</td>
                            </tr>
                            <tr>
                                <td><strong>Samedi</strong></td>
                                <td class="has-text-right">09h00 - 20h00</td>
                            </tr>
                            <tr class="has-background-danger-light">
                                <td><strong>Dimanche</strong></td>
                                <td class="has-text-right has-text-danger">Fermé</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


</main>

<?php include_once("./footer.php") ?>