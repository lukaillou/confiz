
<?php include_once("db.php");
$data = dbquery ("SELECT * FROM confiseries");
print_r($data);
?>