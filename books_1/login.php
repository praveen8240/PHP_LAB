<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] == "admin" && $_POST["password"] == "admin123") {
        setcookie("admin", "true");
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?>

<form method="post">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>