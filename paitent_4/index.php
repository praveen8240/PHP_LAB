<?php
echo "<h2>Welcome to the Patient Management System</h2>";

if (isset($_COOKIE['user'])) {
    echo "Welcome, " . $_COOKIE['user'] . "!";
    echo "<br><a href='view_all_patients.php'>View All Patients</a><br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='register.php'>Register</a><br>";
    echo "<a href='login.php'>Login</a><br>";
}
?>
