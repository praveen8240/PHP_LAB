<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users = json_decode(file_get_contents("users.json"), true);

    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            setcookie('user', $user['name'], time() + (86400 * 30), "/"); // 30 days expiration
            header("Location: index.php");
            exit();
        }
    }

    $error = "Invalid credentials. Please try again.";
}
?>

<h2>Login</h2>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

