<?php
// Inclut la connexion à la base de données
include_once("db.php");

// Récupère toutes les boutiques, confiseries, catégories uniques et utilisateurs
$boutiques = dbquery("SELECT * FROM boutiques");
$confiseries = dbquery("SELECT * FROM confiseries");
$types = dbquery("SELECT DISTINCT type FROM confiseries");
$utilisateurs = dbquery("SELECT * FROM utilisateurs");

// Si un utilisateur est connecté, récupère uniquement SES boutiques
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
    $boutiques_gerant = dbquery("SELECT * FROM boutiques WHERE utilisateur_id = ?", [$_SESSION["user"]["id"]]);
}
// Calcule la quantité totale en stock pour chaque produit (addition de toutes les boutiques)
$stock = dbquery("SELECT confiserie_id, SUM(quantite) as total FROM stocks GROUP BY confiserie_id");
$stocks = [];
foreach ($stock as $s) {
    // Range les stocks dans un tableau pratique : [ID_PRODUIT => TOTAL]
    $stocks[$s["confiserie_id"]] = $s["total"];
}
// Parcourt chaque confiserie pour mettre à jour le chemin de sa photo selon son ID (ex: 1.jpg, 2.jpg...)
foreach ($confiseries as $e) {
    dbquery("UPDATE confiseries 
    SET illustration = './img/bonbons/{$e['id']}.jpg' 
    WHERE id = {$e['id']}");
}
;
?>