<?php
//error_reporting(0);
include("header.php");
include("security.php");
include("dbFunctions.php");
?>
    <h2 class="w3-container w3-teal w3-center">Admin Dashboard</h2>
    <div class="w3-container">
    </div>
    <h5 class="w3-center">List Artikel</h5>
<?php
$rest = DbHitung($dbcon);

$numrows = $rest[0];
$rowsperpage = 5;
$totalpages = ceil($numrows / $rowsperpage);
$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}
if ($page > $totalpages) {
    $page = $totalpages;
}
if ($page < 1) {
    $page = 1;
}
$limit = ($page - 1) * $rowsperpage;

$result = DbArtikel($dbcon, $limit, $rowsperpage);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Belum ada artikel";
}
echo "<table class='w3-table-all'>";
echo "<tr class='w3-teal w3-hover-green'>";
echo "<th>ID</th>";
echo "<th>Judul</th>";
echo "<th>Tanggal</th>";
echo "<th>Edit</th>";
echo "</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['judul'];
    $by = $row['penulis'];
    $time = $row['tanggal'];
    ?>

    <tr>
        <td><?php echo $id; ?></td>
        <td><a href="view.php?id=<?php echo $id; ?>"><?php echo substr($title, 0, 50); ?></a></td>
        <td><?php echo $time; ?></td>
        <td><a href="edit.php?id=<?php echo $id; ?>">Edit</a> | <a href="del.php?id=<?php echo $id; ?>"
                                                                   onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</a>
        </td>
    </tr>

    <?php
}
echo "</table>";
// pagination
echo "<div class='w3-bar w3-center'>";
if ($page > 1) {
    echo "<a href='?page=1' class='w3-btn'><<</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
}
$range = 3;
for ($i = ($page - $range); $i < ($page + $range) + 1; $i++) {
    if (($i > 0) && ($i <= $totalpages)) {
        if ($i == $page) {
            echo "<div class='w3-btn w3-teal w3-hover-green'> $i</div>";
        } else {
            echo "<a href='?page=$i' class='w3-btn w3-border'>$i</a>";
        }
    }
}
if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-btn'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'>>></a>";
}
echo "</div>";

include("footer.php");
