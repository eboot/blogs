<?php
session_start();
include("connect.php");
include("security.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $sql = "DELETE FROM artikel WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        header('location: index.php');
    } else {
        echo "gagal menghapus artikel." . mysqli_connect_error();
    }
}
mysqli_close($dbcon);