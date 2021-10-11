<?php
include("header.php");
include("connect.php");
include("security.php");

echo '<div class="w3-container w3-teal">
<h2>Artikel Baru</h2></div>';

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($dbcon, $_POST['title']);
    $diskripsi = mysqli_real_escape_string($dbcon, $_POST['description']);
    $tanggal = date('Y-m-d H:i');
    $penulis = mysqli_real_escape_string($dbcon, $_SESSION['username']);

    $sql = "INSERT INTO artikel (judul, diskripsi, penulis, tanggal) VALUES('$judul', '$diskripsi', '$penulis', '$tanggal')";
    mysqli_query($dbcon, $sql) or die("gagal membuat artikel" . mysqli_connect_error());

    printf("Artikel sudah di publikasikan. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>",
        mysqli_insert_id($dbcon));


} else {

    echo '
<form class="w3-container" method="POST">
<label>Judul</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<label>Arikel</label>
<textarea id="description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>

<input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
</form>
';

}

include("footer.php");   
