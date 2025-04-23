<?php
if (isset($_COOKIE['doctor'])) {
    header("Location: profile.php");
    exit();
}
?>

<h2>Welcome to the Doctor Management System</h2>
<a href="login.php">Doctor Login</a><br>
<a href="register.php">Doctor Registration</a><br>
