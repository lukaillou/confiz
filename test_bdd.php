<<<<<<< HEAD

<?php include_once("db.php");
$data = dbquery ("SELECT * FROM confiseries");
=======
<?php
include_once("db.php");
$data = dbquery("SELECT * FROM confiseries");
>>>>>>> 41fb28ae07eab9f50985a3f5e71ee95e85b9b1aa
print_r($data);
?>