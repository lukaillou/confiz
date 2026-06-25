<?php
session_start();
include_once("db.php");

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $users = dbquery(
        "SELECT * FROM utilisateurs WHERE username = ?",
        [$_POST["username"]]
    );

    if ($users) {
        $hash = $users[0]["password"];

        if (password_verify($_POST["password"], $hash)) {
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = $users[0];
            header("Location: index.php");
            exit();
        } else {
            header("Location: connexion.php");
            exit();
        }
    } else {
        header("Location: connexion.php");
        exit();
    }
}
?>