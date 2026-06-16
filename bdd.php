<?php
include_once("db.php");
$boutiques = dbquery("SELECT * FROM boutiques");
$confiseries = dbquery("SELECT * FROM confiseries");
$utilisateurs = dbquery("SELECT * FROM utilisateurs");
?>