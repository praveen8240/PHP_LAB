<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

$user_email = $_COOKIE['user'];
$tickets = json_decode(file_get_contents("tickets.json"), true);

echo "<h2>Your Travel Details</h2>";

foreach ($tickets as $ticket) {
    if ($ticket["email"] == $user_email) {
        echo "UID: " . $ticket["UID"] . "<br>";
        echo "Travel Date: " . $ticket["Tdate"] . "<br>";
        echo "From: " . $ticket["from"] . "<br>";
        echo "To: " . $ticket["to"] . "<br>";
        echo "Cost: " . $ticket["cost"] . "<br><br>";
    }
}
?>

<a href="update_travel.php">Update Travel Details</a><br>
<a href="logout.php">Logout</a>
