<?php
require_once "db.php";

$id = $_GET['id'] ?? null;

if ($id) {
    dbquery("DELETE FROM films WHERE id = ?", [$id]);
}

header("Location: catalogue.php");
exit;