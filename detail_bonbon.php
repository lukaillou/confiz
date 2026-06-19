<?php 
include_once("./header.php");
include_once("bdd.php");

$id = $_GET["id"];
$confiserie = dbquery("SELECT * FROM confiseries WHERE id = ?", [$id]);
?>

<main>
    <div class="hero">
        <h1><?php echo $confiserie[0]["nom"]; ?></h1>
    </div>

    <div id="liste-confiseries">
        <div class="card">
            <div class="card-contenu">
                <h3><?php echo $confiserie[0]["nom"]; ?></h3>
            </div>
            <img src="<?php echo $confiserie[0]["illustration"]; ?>" alt="placeholder" class="card-img">
        </div>
    </div>
</main>

<?php include_once("./footer.php") ?>