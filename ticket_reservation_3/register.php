<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST;
    $users = json_decode(file_get_contents("users.json"), true);
    $users[] = $user;
    file_put_contents("users.json", json_encode($users));

    echo "Registration successful! <a href='login.php'>Login</a>";
}
?>

<h2>Register</h2>
<form method="post">
    Name: <input type="text" name="uname"><br>
    Gender: <input type="text" name="gen"><br>
    Date of Birth: <input type="date" name="dob"><br>
    Age: <input type="number" name="age"><br>
    Email: <input type="email" name="email"><br>
    Mobile: <input type="text" name="mobile"><br>
    Password: <input type="password" name="password"><br>
    Address: <textarea name="address"></textarea><br>
    <input type="submit" value="Register">
</form>
