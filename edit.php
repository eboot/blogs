<?php
include("header.php");
include("connect.php");
include("security.php");

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}

$sql = "SELECT * FROM artikel WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: index.php");
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['judul'];
$description = $row['diskripsi'];

if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);

    $sql2 = "UPDATE artikel SET judul = '$title', diskripsi = '$description' WHERE id = $id";

    if (mysqli_query($dbcon, $sql2)) {
        echo "Artikel berhasil diperbaharui.";
        echo "<meta http-equiv='refresh' content='2; url=view.php?id=$id' />";

    } else {
        echo "gagal mengedit artikel." . mysqli_connect_error();
    }
}
?>

    <form action="" method="POST" class="w3-container">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Judul</label>
        <input type="text" class="w3-input w3-border" name="title" value="<?php echo $title; ?>">

        <label>Artikel</label>
        <textarea class="w3-input w3-border" id="description" name="description"><?php echo $description; ?> </textarea>

        <input type="submit" class="w3-btn w3-teal w3-round" name="upd" value="Simpan">
    </form>


<?php

mysqli_close($dbcon);
include("footer.php");
