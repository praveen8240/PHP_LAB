<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient = $_POST;
    $patients = json_decode(file_get_contents("patients.json"), true);

    $patients[] = $patient; // Add the new patient to the list
    file_put_contents("patients.json", json_encode($patients));

    echo "Patient registration successful! <a href='login.php'>Login</a>";
}
?>

<h2>Patient Registration</h2>
<form method="post">
    Patient ID: <input type="text" name="pid" required><br>
    Patient Name: <input type="text" name="pname" required><br>
    Gender: <input type="text" name="gen" required><br>
    Age: <input type="number" name="age" required><br>
    Disease: <input type="text" name="disease" required><br>
    Doctor Name: <input type="text" name="drname" required><br>
    Mobile: <input type="text" name="pmobile" required><br>
    Address: <textarea name="paddress" required></textarea><br>
    <input type="submit" value="Register">
</form>
