<?php
include_once("db.php");
// Récupération de la liste complète
$boutiques = dbquery("SELECT * FROM boutiques");
$confiseries = dbquery("SELECT * FROM confiseries");
// doublons même catégorie
$types = dbquery("SELECT DISTINCT type FROM confiseries");

$utilisateurs = dbquery("SELECT * FROM utilisateurs");
// Si connecté, récupération spécifique des boutiques utilisateur 
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
    $boutiques_gerant = dbquery("SELECT * FROM boutiques WHERE utilisateur_id = ?", [$_SESSION["user"]["id"]]);
}
// Récup  somme tot des stocks pour chaques confiserie, groupée par l'identifiant du bonbon
$stock = dbquery("SELECT confiserie_id, SUM(quantite) as total FROM stocks GROUP BY confiserie_id");

$stocks = [];
// Transformation résultat requête 
foreach ($stock as $s) {
    $stocks[$s["confiserie_id"]] = $s["total"];
}
// Boucle chaque confiserie : chemin de son image d'illustration
foreach ($confiseries as $e) {
    // Met à jour la table 'confiseries' en attribuant un chemin standardisé basé sur l'ID
    dbquery("UPDATE confiseries 
    SET illustration = './img/bonbons/{$e['id']}.jpg' 
    WHERE id = {$e['id']}");
}
;
?>