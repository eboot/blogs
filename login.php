<?php
Include("header.php");
Include("dbFunctions.php");

echo '<h2 class="w3-container w3-teal">Login</h2>';

if (isset($_POST['log'])) {
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);

    $result = dbLogin($dbcon, $username);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);


    if ($row_count == 1 && password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("location: admin.php");
    } else {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>username atau password yang dimasukan salah!</div>";
    }
}
    ?>

    <form action="" method="POST" class="w3-container w3-padding">
        <label>Username </label>
        <input type="text" name="username"  value="<?php strip_tags(isset($_POST['username']))?>" class="w3-input w3-border">
        <label>Password</label>
        <input type="password" name="password" class="w3-input w3-border">
        <p><input type="submit" name="log" value="Login" class="w3-btn w3-teal"></p>
    </form>

    <?php

Include("footer.php");
