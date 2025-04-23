<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            setcookie('user', $email);
            header("Location: index.php");
            exit();
        }
    }

    echo "Invalid login details.";
}
?>

<h2>Login</h2>
<form method="post">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
