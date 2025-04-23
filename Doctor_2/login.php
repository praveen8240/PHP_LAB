<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctors = json_decode(file_get_contents("doctors.json"), true);
    foreach ($doctors as $doctor) {
        if ($doctor["email"] == $_POST["email"] && $doctor["password"] == $_POST["password"]) {
            setcookie("doctor", $_POST["email"]);
            header("Location: profile.php");
            exit();
        }
    }
    echo "Invalid email or password.";
}
?>

<form method="post">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
