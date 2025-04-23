<?php
if (!isset($_COOKIE['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome Admin</h2>
<a href="add_book.php">Add Book</a><br>
<a href="view_book.php">View Book by ID</a><br>
<a href="view_all.php">Filter Books</a><br>
<a href="logout.php">Logout</a>