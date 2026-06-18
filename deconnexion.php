<?php
session_start();
unset($_SESSION["logged_in"]);
unset($_SESSION["user"]);
session_destroy();
header("Location: index.php");
exit();
?>