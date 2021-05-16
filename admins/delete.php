<?php
require_once('../../db.php');


$statement = $conn->prepare("DELETE FROM accounts WHERE id   = " . $_GET["id"] . "");
$statement->execute(array(1));

echo "<script>alert('Successfully removed!!!'); window.location='index.php'</script>";
