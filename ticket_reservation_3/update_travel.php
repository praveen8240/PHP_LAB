<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

$tickets = json_decode(file_get_contents("tickets.json"), true);
$user_email = $_COOKIE['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated_ticket = $_POST;
    $updated_ticket["email"] = $user_email; // Ensure email is included in the update

    foreach ($tickets as &$ticket) {
        if ($ticket["email"] == $user_email && $ticket["Tdate"] == $_POST["old_Tdate"]) {
            $ticket = $updated_ticket; // Update the ticket details
        }
    }

    file_put_contents("tickets.json", json_encode($tickets)); // Save updated tickets
    echo "Travel details updated.";
}
?>

<h2>Update Travel Details</h2>
<form method="post">
    Old Travel Date: <input name="old_Tdate" type="date"><br>
    New Travel Date: <input name="Tdate" type="date"><br>
    From: <input name="from"><br>
    To: <input name="to"><br>
    Cost: <input name="cost"><br>
    <input type="submit" value="Update Ticket">
</form>

<a href="travel_details.php">View Travel Details</a><br>
<a href="logout.php">Logout</a>
