<?php
require_once "db.php";

// 1. récupérer l'id depuis l'URL
$id = $_GET['id'] ?? null;

// 2. sécurité basique
if ($id) {
    dbquery("DELETE FROM films WHERE id = ?", [$id]);
}

// 3. redirection vers le catalogue
header("Location: catalogue.php");
exit;