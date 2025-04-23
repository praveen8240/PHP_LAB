<?php
if (!isset($_COOKIE['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bid = $_POST["bid"];
    $books = json_decode(file_get_contents("books.json"), true);
    foreach ($books as $book) {
        if ($book["bid"] == $bid) {
            echo "<pre>"; print_r($book); echo "</pre>";
            exit();
        }
    }
    echo "Book not found.";
}
?>

<form method="post">
    Enter Book ID: <input name="bid"><br>
    <input type="submit" value="View Book">
</form>
