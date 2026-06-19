<?php include_once("./header.php");
include_once("bdd.php");
?>

<main>
    <div class="hero">
        <h1>Quelle boutique recherchez vous ?</h1>
    </div>
     <div class="hero">
     <p>Séléctionnez une boutique</p>
     </div>

    <div id="liste-confiseries">
        <?php foreach ($boutiques as $elem) { ?>    
        <div class="card">
                <div class="card-contenu">
                    <a href="./detail_boutiques.php?id=<?php echo $elem["id"]; ?>"><h3><?php echo $elem["nom"]; ?></h3></a>
                </div>
                <img src="./img/placeholder.png" alt="placeholder" class="card-img">
            </div>
        <?php } ?>
    </div>
</main>

<script src="./js/script.js"></script>

<?php include_once("./footer.php") ?>