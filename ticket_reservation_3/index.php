<?php
echo "<h2>Welcome to the Ticket Reservation System</h2>";

if (isset($_COOKIE['user'])) {
    echo "Welcome, " . $_COOKIE['user'] . "!";
    echo "<br><a href='travel_details.php'>View Travel Details</a><br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='register.php'>Register</a><br>";
    echo "<a href='login.php'>Login</a><br>";
}
?>
