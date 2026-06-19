<?php
include_once("db.php");
$boutiques = dbquery("SELECT * FROM boutiques");
$confiseries = dbquery("SELECT * FROM confiseries");
$utilisateurs = dbquery("SELECT * FROM utilisateurs");

foreach ($confiseries as $e) {
    dbquery("UPDATE confiseries 
    SET illustration = './img/bonbons/{$e['id']}.jpg' 
    WHERE id = {$e['id']}");
}
;
?>