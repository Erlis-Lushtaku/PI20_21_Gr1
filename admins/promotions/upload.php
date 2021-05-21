<?php

require_once('../db.php');

if (isset($_POST['Submit'])) {

    move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/gallery/" . $_FILES["image"]["name"]);
    $location = $_FILES["image"]["name"];
    $fname = $_POST['Submited'];
    $lname = $_POST['Photos_name'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO gallery (Submited, Photos_name, image_location)
VALUES ('$fname', '$lname', '$location')";

    $conn->exec($sql);
    echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
}