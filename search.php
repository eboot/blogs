<?php
include("header.php");
include("connect.php");

if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($dbcon, $_GET['q']);

    $sql = "SELECT * FROM artikel WHERE judul LIKE '%".$q."%'";
    $result = mysqli_query($dbcon, $sql);


    if (!$result || mysqli_num_rows($result) == 0) {
        echo "Artikel yang dicari tidak ada.";
    } else {

      echo "<div class='w3-container w3-padding'>Hasil Pencarian dari <strong>$q</strong></div>";

      while ($row = mysqli_fetch_assoc($result)) {

        $id = htmlentities($row['id']);
        $judul = htmlentities($row['judul']);
        $dis = htmlentities(strip_tags($row['diskripsi']));
        $tgl = htmlentities($row['tanggal']);

        echo '<div class="w3-panel w3-sand w3-card-4">';
        echo "<h3><a href='view.php?id=$id'>$judul</a></h3><p>";

        echo substr($dis, 0, 100);

        echo '</p><div class="w3-text-teal">';
        echo "<a href='view.php?id=$id'>Baca Selengkapnya...</a>";

        echo '</div> <div class="w3-text-grey">';
        echo "$tgl</div>";
        echo '</div>';

      }

    }
}
include("footer.php");
