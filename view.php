<?php
include("header.php");
include("connect.php");
$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}
$sql = "Select * FROM artikel WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: index.php");
}

$hsql = "SELECT * FROM artikel WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['judul'];
$dis = $row['diskripsi'];
$pnls = $row['penulis'];
$tgl = $row['tanggal'];

echo '<div class="w3-container w3-sand w3-card-4">';

echo "<h3>$title</h3>";
echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-sand w3-card-4">';
echo "$dis<br>";
echo '<div class="w3-text-grey">';
echo "Penulis: " . $pnls . "<br>";
echo "<p>Tanggal: $tgl</p></div>";
?>


<?php
if (isset($_SESSION['username'])) {
    ?>
    <div class="w3-text-green"><a href="edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Yakin ingin menghapus artikel ini?'); ">[Hapus]</a></div>
    <?php
}
echo '</div></div>';


include("footer.php");
