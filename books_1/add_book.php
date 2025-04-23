<?php
if (!isset($_COOKIE['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book = $_POST;
    $books = json_decode(file_get_contents("books.json"), true);
    $books[] = $book;
    file_put_contents("books.json", json_encode($books));
    echo "Book added.";
}
?>

<form method="post">
    Book ID: <input name="bid"><br>
    Title: <input name="btitle"><br>
    Branch: <input name="branch"><br>
    Version: <input name="version"><br>
    Author: <input name="author"><br>
    Publisher: <input name="publisher"><br>
    Price: <input name="price"><br>
    <input type="submit" value="Add Book">
</form>
