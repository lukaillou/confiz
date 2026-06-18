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
                <img src="./img/bonbons/<?php echo $elem["nom"]; ?>.jpg" alt="placeholder" class="card-img">
            </div>
        <?php } ?>
    </div>
</main>

<script src="./js/script.js"></script>

<?php include_once("./footer.php") ?>