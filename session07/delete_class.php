<?php
include 'conect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM  class WHERE id = '$id'";
    $conn -> query($sql);
    header("location:class.php");
}
?>
