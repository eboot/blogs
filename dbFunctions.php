<?php
include("connect.php");

/**
 * login menggunakan usernam dan dan password pada database
 */

 function dbLogin($dbcon, $username){
    $sql = "SELECT * FROM admin WHERE username = '$username';";
    return mysqli_query($dbcon, $sql);
 }

/**
 * menghitung jumlah artikel pada database
 */
function DbHitung($dbcon){
    $sql = "SELECT COUNT(*) FROM artikel";
    $result = mysqli_query($dbcon, $sql);
    return mysqli_fetch_row($result);
}

/**
 * mengambil data artikel yang ada di database
 */

function DbArtikel($dbcon, $limit, $page){
    $sql = "SELECT * FROM artikel ORDER BY id DESC LIMIT $limit, $page";
    return mysqli_query($dbcon, $sql);
}