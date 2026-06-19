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
                    <h3><?php echo $elem["nom"]; ?></h3>
                </div>
                <img src="./img/bonbons/<?php echo $elem["id"]; ?>.jpg" alt="Image <?php echo $elem["nom"]; ?>" class="card-img">
                <div class="card-contenu">
                    <p><?php echo $elem["prix"]; ?>€</p>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

<script src="./js/script.js"></script>

<?php include_once("./footer.php") ?>