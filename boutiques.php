<?php include_once("./header.php");
include_once("bdd.php");
?>



<main>
    <div class="hero">
        <h1>Que recherchez vous ?</h1>
    </div>
    <?php
    foreach ($data as $elem) {
        ?>

        <div class="card">
            <div class="card-contenu">
                <h3 class="card-titre"></h3>
                    
                    <p>Nom :
                        <?php echo ($elem["nom"]); ?>
                    </p>



                    <p class="card-description"></p>

                    <span class="card-prix"></span>
                </div>
                <img src="./img/placeholder.png" alt="placeholder" class="card-img">
            </div>
    <?php } ?>

</main>

<script src="./js/script.js"></script>

<?php include_once("./footer.php") ?>