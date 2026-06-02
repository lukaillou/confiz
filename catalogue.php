<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Catalogue de films</title>
</head>

<body>

    <?php
    require_once "db.php";
    $films = dbquery("SELECT * FROM films");
    ?>

    <table>
        <thead>
            <tr><a href="ajouter.php">Ajouter un nouveau film</a></tr>
            <tr>
                <th>Titre</th>
                <th>Durée</th>
                <th>Auteur</th>
                <th>Date de sortie</th>
                <th>Budget</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($films as $film) { ?>
                <tr>
                    <td><?= htmlspecialchars($film['titre']) ?></td>
                    <td><?= htmlspecialchars($film['duree']) ?></td>
                    <td><?= htmlspecialchars($film['auteur']) ?></td>
                    <td><?= htmlspecialchars($film['date_sortie']) ?></td>
                    <td><?= htmlspecialchars($film['budget']) ?></td>
                    <td><a href="supprimer.php?id=<?= $film['id'] ?>">Supprimer</a></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>