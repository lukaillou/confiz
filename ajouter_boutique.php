<?php
include_once("./header.php");
include_once("bdd.php");

// Vérifier que c'est un admin  ou connecté  et redirige accueil
if (!isset($_SESSION["logged_in"]) || $_SESSION["user"]["role"] !== "admin") {
    header("Location: index.php");
    exit();
}

// Traitement du formulaire
if (isset($_POST["ajouter"])) {
    // Préparation de la requête SQL 
    $stmt = $PDO->prepare("INSERT INTO boutiques (nom, utilisateur_id, numero_rue, nom_adresse, code_postal, ville, pays) VALUES (?, ?, ?, ?, ?, ?, ?)");
    // Exécute avec les données envoyées par le formulaire
    $stmt->execute([
        $_POST["nom"],
        $_POST["utilisateur_id"],
        $_POST["numero_rue"],
        $_POST["nom_adresse"],
        $_POST["code_postal"],
        $_POST["ville"],
        $_POST["pays"]
    ]);
    // Redige vers liste boutiques après l'ajout
    header("Location: boutiques.php");
    exit();
}
?>
<main>
    <section class="section">
        <h1 class="title has-text-centered">Ajouter une boutique</h1>
    </section>

    <div class="container">
        <div class="box" style="max-width: 600px; margin: auto;">
            <form method="POST">
                <div class="field">
                    <label class="label">Nom de la boutique</label>
                    <div class="control">
                        <input class="input" type="text" name="nom" required placeholder="Ex : Confiz Paris">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Gérant</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="utilisateur_id" required>
                                <?php foreach ($utilisateurs as $u) { ?>
                                    <?php if ($u["role"] === "gerant") { ?>
                                        <option value="<?php echo $u["id"]; ?>">
                                            <?php echo $u["prenom"] . " " . $u["nom"]; ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Numéro de rue</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_rue" required placeholder="Ex : 10">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Nom de l'adresse</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_adresse" required placeholder="Ex : Rue des Bonbons">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Code postal</label>
                    <div class="control">
                        <input class="input" type="text" name="code_postal" required placeholder="Ex : 75001">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Ville</label>
                    <div class="control">
                        <input class="input" type="text" name="ville" required placeholder="Ex : Paris">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Pays</label>
                    <div class="control">
                        <input class="input" type="text" name="pays" required placeholder="Ex : France">
                    </div>
                </div>

                <button type="submit" name="ajouter" class="button is-rounded connexion is-fullwidth mt-4">
                    Ajouter la boutique
                </button>
            </form>
        </div>
    </div>
</main>

<?php include_once("./footer.php") ?>