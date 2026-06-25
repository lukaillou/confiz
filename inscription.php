<?php
session_start();
include_once("db.php");

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
    
    $existant = dbquery("SELECT * FROM utilisateurs WHERE username = ?", [$_POST["username"]]);
    
    if ($existant) {
        $erreur = "Ce nom d'utilisateur est déjà pris.";
    } else {
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        $stmt = $PDO->prepare("INSERT INTO utilisateurs (username, password, email, role, nom, prenom, ddn) VALUES (?, ?, ?, 'client', ?, ?, ?)");
        $stmt->execute([
            $_POST["username"],
            $hash,
            $_POST["email"],
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["ddn"]
        ]);
        
        header("Location: connexion.php");
        exit();
    }
}
?>

<?php include_once("header.php") ?>

<main>
    <?php if (isset($erreur)) echo "<p style='color:red'>$erreur</p>"; ?>

    <form action="inscription.php" method="POST">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required />

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required />

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" required />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required />

        <label for="ddn">Date de naissance</label>
        <input type="date" name="ddn" id="ddn" required />

        <label for="password">Mot de passe (8 caractères minimum)</label>
        <input type="password" name="password" id="password" minlength="8" required />

        <input type="submit" value="S'inscrire" />
    </form>
</main>

<?php include_once("footer.php") ?>