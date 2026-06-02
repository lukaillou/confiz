<?php
require_once "db.php";

// Si le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titre = $_POST["titre"] ?? null;
    $duree = $_POST["duree"] ?? null;
    $auteur = $_POST["auteur"] ?? null;
    $date_sortie = $_POST["date_sortie"] ?? null;
    $budget = $_POST["budget"] ?? null;

    if ($titre && $duree && $auteur && $date_sortie) {

        dbquery(
            "INSERT INTO films (titre, duree, auteur, date_sortie, budget)
             VALUES (?, ?, ?, ?, ?)",
            [$titre, $duree, $auteur, $date_sortie, $budget]
        );

        header("Location: catalogue.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un film</title>
</head>

<body>

    <h1>Ajouter un film 🎬</h1>

    <form action="ajouter.php" method="POST">

        <input type="text" name="titre" placeholder="Titre" required>
        <br><br>

        <input type="number" name="duree" placeholder="Durée (min)" required>
        <br><br>

        <input type="text" name="auteur" placeholder="Auteur" required>
        <br><br>

        <input type="date" name="date_sortie" required>
        <br><br>

        <input type="number" name="budget" placeholder="Budget (optionnel)">
        <br><br>

        <input type="submit" value="Ajouter le film">
    </form>

</body>

</html>