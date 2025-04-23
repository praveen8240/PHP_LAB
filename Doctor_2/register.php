<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor = $_POST;
    $doctors = json_decode(file_get_contents("doctors.json"), true);
    $doctors[] = $doctor;
    file_put_contents("doctors.json", json_encode($doctors));
    echo "Doctor registered successfully.";
}
?>

<form method="post">
    Doctor ID: <input name="drId"><br>
    Name: <input name="drname"><br>
    Gender: <input name="gender"><br>
    Specialisation: <input name="specialisation"><br>
    Email: <input name="email" type="email"><br>
    Password: <input name="password" type="password"><br>
    Mobile: <input name="mobile"><br>
    <input type="submit" value="Register">
</form>
