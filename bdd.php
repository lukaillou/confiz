<?php
include_once("db.php");
$boutiques = dbquery("SELECT * FROM boutiques");
$confiseries = dbquery("SELECT * FROM confiseries");
$types = dbquery("SELECT DISTINCT type FROM confiseries");
$utilisateurs = dbquery("SELECT * FROM utilisateurs");

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
    $boutiques_gerant = dbquery("SELECT * FROM boutiques WHERE utilisateur_id = ?", [$_SESSION["user"]["id"]]);
}

$stock = dbquery("SELECT confiserie_id, SUM(quantite) as total FROM stocks GROUP BY confiserie_id");
$stocks = [];
foreach ($stock as $s) {
    $stocks[$s["confiserie_id"]] = $s["total"];
}

foreach ($confiseries as $e) {
    dbquery("UPDATE confiseries 
    SET illustration = './img/bonbons/{$e['id']}.jpg' 
    WHERE id = {$e['id']}");
}
;
?>