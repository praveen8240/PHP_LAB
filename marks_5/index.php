<?php
echo "<h2>Welcome to the Student Results Management System</h2>";

if (isset($_COOKIE['user'])) {
    echo "Welcome, " . $_COOKIE['user'] . "!";
    echo "<br><a href='marks_entry.php'>Enter Marks</a><br>";
    echo "<a href='view_all_records.php'>View All Records</a><br>";
    echo "<a href='view_branchwise.php'>View Branch-wise Records</a><br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='login.php'>Login</a><br>";
}
?>
