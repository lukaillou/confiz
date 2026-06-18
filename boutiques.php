<?php include_once("./header.php");
include_once("bdd.php");
?>

<main>
    <div class="hero">
        <h1>Que recherchez vous ?</h1>
    </div>

    <div id="liste-confiseries">
        <?php foreach ($boutiques as $elem) { ?>    
        <div class="card">

                <div class="card-contenu">
                    <a href="./confiseries.php"><h3><?php echo $elem["nom"]; ?></h3></a>
                </div>
                <img src="./img/placeholder.png" alt="placeholder" class="card-img">
            </div>
        <?php } ?>
    </div>
</main>

<script src="./js/script.js"></script>

<?php include_once("./footer.php") ?>