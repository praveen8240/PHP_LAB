<?php
if (!isset($_COOKIE['doctor'])) {
    echo "Please login first.";
    exit();
}

$doctors = json_decode(file_get_contents("doctors.json"), true);
$doctor_email = $_COOKIE['doctor'];

foreach ($doctors as $doctor) {
    if ($doctor["email"] == $doctor_email) {
        echo "<h2>Doctor Profile</h2>";
        echo "Doctor ID: " . $doctor["drId"] . "<br>";
        echo "Name: " . $doctor["drname"] . "<br>";
        echo "Gender: " . $doctor["gender"] . "<br>";
        echo "Specialisation: " . $doctor["specialisation"] . "<br>";
        echo "Email: " . $doctor["email"] . "<br>";
        echo "Mobile: " . $doctor["mobile"] . "<br>";
        break;
    }
}
?>

<a href="logout.php">Logout</a>
