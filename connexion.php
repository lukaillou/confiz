<?php
session_start();
include_once("db.php");

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $users = dbquery(
        "SELECT * FROM utilisateurs WHERE username = ?",
        [$_POST["username"]]
    );

    if ($users && password_verify($_POST["password"], $users[0]["password"])) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user"] = $users[0];
        header("Location: index.php");
        exit();
    } else {
        header("Location: connexion.php");
        exit();
    }
}
?>

<?php include_once("header.php") ?>

<main>
    <form action="connexion.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" />
        <input type="password" name="password" placeholder="Mot de passe" />
        <input type="submit" value="Se connecter" />
    </form>
</main>

<?php include_once("footer.php") ?>