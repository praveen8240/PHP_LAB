<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $patients = json_decode(file_get_contents("patients.json"), true);
    $found = false;

    foreach ($patients as $patient) {
        if ($patient['pid'] == $pid) {
            echo "<h2>Patient Profile</h2>";
            echo "Patient ID: " . $patient['pid'] . "<br>";
            echo "Name: " . $patient['pname'] . "<br>";
            echo "Gender: " . $patient['gen'] . "<br>";
            echo "Age: " . $patient['age'] . "<br>";
            echo "Disease: " . $patient['disease'] . "<br>";
            echo "Doctor Name: " . $patient['drname'] . "<br>";
            echo "Mobile: " . $patient['pmobile'] . "<br>";
            echo "Address: " . $patient['paddress'] . "<br>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "No patient found with ID: $pid";
    }
}
?>

<form method="get">
    Enter Patient ID: <input type="text" name="pid" required><br>
    <input type="submit" value="View Patient">
</form>
