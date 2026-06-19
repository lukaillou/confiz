<?php include_once("./header.php");
include_once("bdd.php");
?>

<main>
    <div class="hero">
        <h1>Que recherchez vous ?</h1>
    </div>

    <div id="liste-confiseries">
        <?php foreach ($confiseries as $elem) { ?>
            <div class="card">

                <div class="card-contenu">
                    <a href="./detail_bonbon.php?id=<?php echo $elem["id"]; ?>"><h3><?php echo $elem["nom"]; ?></h3></a>
                </div>
                <img class="card-img"src="<?php echo $elem['illustration']; ?>" alt="Image <?php echo $elem['illustration']; ?>">
                <div class="card-contenu">
                    <p><?php echo $elem["prix"]; ?>€</p>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

<?php include_once("./footer.php") ?>