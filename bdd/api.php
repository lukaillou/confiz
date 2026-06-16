<?php
try {
    $host = 'localhost';
    $db = 'confiserie';
    $user = 'confiz';
    $pass = 'motdepasse';

    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM confiseries");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}