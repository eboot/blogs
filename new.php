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

    $upload = "upload/";
    $rand   = time();
    $gambar      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
    $ImageType      = $_FILES['image']['type'][0];
 
    $gmbrExt = substr($gambar, strrpos($gambar, '.'));
    $gmbrExt       = str_replace('.','',$gmbrExt);
    $gambar      = preg_replace("/\.[^.\s]{3,4}$/", "", $gambar);
    $namaGambar = $gambar.'-'.$rand.'.'.$gmbrExt;
    $ret[$namaGambar]= $upload.$namaGambar;

    
    if (!file_exists($upload))
    {
        @mkdir($upload, 0777);
    }               
    move_uploaded_file($_FILES["image"]["tmp_name"][0],$upload."/".$namaGambar );



    $sql = "INSERT INTO artikel (judul, diskripsi, gambar, penulis, tanggal) VALUES('$judul', '$diskripsi', '$namaGambar', '$penulis', '$tanggal')";
    mysqli_query($dbcon, $sql) or die("gagal membuat artikel" . mysqli_connect_error());

    printf("Artikel sudah di publikasikan.",
        mysqli_insert_id($dbcon));


} else {

    echo '
<form class="w3-container" method="POST" enctype="multipart/form-data">
<label>Judul</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<input type="file" class="w3-input w3-border" name="image[]" required/>
<br>

<textarea id="description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>

<input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
</form>
';

}

include("footer.php");   
