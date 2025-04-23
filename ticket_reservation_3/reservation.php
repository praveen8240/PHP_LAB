<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

$user_email = $_COOKIE['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket = $_POST;
    $ticket["email"] = $user_email; // Store email in the ticket data
    $tickets = json_decode(file_get_contents("tickets.json"), true);
    $tickets[] = $ticket; // Add the ticket to the list
    file_put_contents("tickets.json", json_encode($tickets)); // Save ticket data
    echo "Ticket reserved successfully.";
}
?>

<h2>Ticket Reservation</h2>
<form method="post">
    UID: <input name="UID"><br>
    Travel Date: <input name="Tdate" type="date"><br>
    From: <input name="from"><br>
    To: <input name="to"><br>
    Cost: <input name="cost"><br>
    <input type="submit" value="Reserve Ticket">
</form>
