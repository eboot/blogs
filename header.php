<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">
    <title>Website Sederhana Dengan PHP dan Mysql</title>

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src='tinymce/tinymce.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<body>

<header class="w3-container w3-teal">
    <h1>Website sederhana</h1>
</header>

<div class="w3-bar w3-border">
    <a href="index.php" class="w3-bar-item w3-button w3-pale-green">Home</a>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<a href='new.php' class='w3-bar-item w3-btn'>Buat Artikel</a>";
        echo "<a href='admin.php' class='w3-bar-item w3-btn'>Admin Panel</a>";
        echo "<a href='logout.php' class='w3-bar-item w3-btn'>Logout</a>";
    } else {
        echo "<a href='login.php' class='w3-bar-item w3-pale-red' >Login</a>";
    }
    ?>
</div>
<br>

<form action="search.php" method="GET" class="w3-container">
    <input type="text" name="q" class="w3-input w3-border" placeholder="Cari Artikel" required>
    <input type="submit" class="w3-btn w3-teal" value="Cari">
</form>