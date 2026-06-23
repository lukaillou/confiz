<?php
include_once("db.php");
$boutiques = dbquery("SELECT * FROM boutiques");

$confiseries = dbquery("SELECT * FROM confiseries");

$types = dbquery("SELECT DISTINCT type FROM confiseries");

$utilisateurs = dbquery("SELECT * FROM utilisateurs");

$boutiques_gerant = dbquery("SELECT * FROM boutiques WHERE utilisateur_id = ?", [$_SESSION["user"]["id"]]);

foreach ($confiseries as $e) {
    dbquery("UPDATE confiseries 
    SET illustration = './img/bonbons/{$e['id']}.jpg' 
    WHERE id = {$e['id']}");
}
;
?>