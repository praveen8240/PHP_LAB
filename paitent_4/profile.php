<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

$patients = json_decode(file_get_contents("patients.json"), true);
$user_email = $_COOKIE['user'];

echo "<h2>Your Profile</h2>";

$found = false;
foreach ($patients as $patient) {
    if ($patient['drname'] == $user_email) {
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
    echo "No profile found.";
}
?>
