<?php
require_once('../db.php');


$statement = $conn->prepare("DELETE FROM gallery WHERE tbl_image_id = " . $_GET["tbl_image_id"] . "");
$statement->execute();

echo "<script>alert('Successfully removed!!!'); window.location='./index.php'</script>";
?>