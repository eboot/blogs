<?php
include("header.php");
include("dbFunctions.php")
?>

<div class="w3-panel">
    <p>Website sederhana dengan php dan mysql</p>
</div>

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

$result = DbArtikel($dbcon,$limit,$rowsperpage);

if (!$result || mysqli_num_rows($result) == 0) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">Belum ada artikel</div>';
}
echo "<div class='w3-row w3-panel'>";
echo "<div class='w3-col l8 w3-cente'>";
while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['judul']);
    $des = htmlentities(strip_tags($row['diskripsi']));
    $wkt = htmlentities($row['tanggal']);

    echo '<div class="w3-panel w3-sand w3-card-4">';
    echo "<h3><a href='view.php?id=$id'>$title</a></h3><p>";

    echo substr($des, 0, 100);

    echo '<div class="w3-text-teal">';
    echo "<a href='view.php?id=$id'>Selengkapnya...</a></p>";

    echo '</div>';
    echo "<div class='w3-text-grey'> $wkt </div>";
    echo '</div>';
}
echo '</div>'; // end w3-col l9
echo '<div class="clearfix"></div>';
echo '<div class="w3-col l3 s6 w3-center" style="margin: 0px 50px;">';

include "widget.php";

?>



<?php
echo '</div>'; // end w3-col l3

echo '</div>';
echo "<div class='w3-bar w3-center'>";

if ($page > 1) {
    echo "<a href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
}

$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='w3-teal w3-button'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='w3-button w3-border'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
}

echo "</div>";

include("footer.php");
