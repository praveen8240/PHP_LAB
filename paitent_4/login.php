<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == 'admin@example.com' && $password == 'admin123') {
        setcookie('user', $email);
        header("Location: index.php");
        exit();
    }

    echo "Invalid login details.";
}
?>

<h2>Login</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
