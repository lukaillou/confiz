<?php 
include_once("./header.php");
include_once("bdd.php");

$id = $_GET["id"];
$boutique = dbquery("SELECT * FROM boutiques WHERE id = ?", [$id]);
?>

<main>
    <div class="hero">
        <h1><?php echo $boutique[0]["nom"]; ?></h1>
    </div>

    <div id="liste-confiseries">
        <div class="card">
            <div class="card-contenu">
                <h3><?php echo $boutique[0]["nom"]; ?></h3>
            </div>
            <img src="./img/placeholder.png" alt="placeholder" class="card-img">
        </div>
    </div>
</main>

<?php include_once("./footer.php") ?>