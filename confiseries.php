<?php include_once("./header.php");
include_once("bdd.php");
?>

<main>
    <div class="columns is-fullwidth" style="width:100%;">

        <div class="column is-3">
            <aside class="box filtres">
                <h2 class="title is-5">Filtres Boutique</h2>
                <div class="field mt-3">
                    <label class="label">Type</label>
                    <?php foreach ($types as $type) { ?>
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" value="<?php echo $type["type"]; ?>">
                                <?php echo $type["type"]; ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </aside>
        </div>

        <div class="column">
            <div class="columns is-multiline">
                <?php foreach ($confiseries as $elem) { ?>
                    <div class="column is-3">
                        <div class="card confiserie-card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="<?php echo $elem['illustration']; ?>" alt="Image <?php echo $elem['nom']; ?>">
                                </figure>
                            </div>
                            <div class="card-content">
                                <p class="title is-6"><?php echo $elem['nom']; ?> - <?php echo $elem['type']; ?></p>
                                <p class="subtitle is-7 has-text-black"><?php echo $elem['description']; ?></p>
                            </div>
                            <footer class="card-footer is-align-items-center px-4 py-3">
                                <a class="button is-rounded is-small connexion"
                                    href="./detail_bonbon.php?id=<?php echo $elem['id']; ?>">Acheter</a>
                                <span
                                    class="ml-auto has-text-weight-bold has-text-black"><?php echo $elem['prix']; ?>€</span>
                                <span class="ml-3 is-size-7 has-text-grey">
                                    
                                    <?php if (isset($stocks[$elem["id"]])) {
                                        echo $stocks[$elem["id"]] . " dispo";
                                    } else {
                                        echo "Rupture";
                                    }
                                    ; ?>
                                    
                                </span>
                            </footer>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</main>

<?php include_once("./footer.php") ?>