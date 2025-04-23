<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

$patients = json_decode(file_get_contents("patients.json"), true);

echo "<h2>All Patients</h2>";
foreach ($patients as $patient) {
    echo "Patient ID: " . $patient['pid'] . "<br>";
    echo "Name: " . $patient['pname'] . "<br>";
    echo "Disease: " . $patient['disease'] . "<br>";
    echo "Doctor Name: " . $patient['drname'] . "<br>";
    echo "Mobile: " . $patient['pmobile'] . "<br>";
    echo "<hr>";
}
?>

<a href="index.php">Home</a><br>
<a href="logout.php">Logout</a>
