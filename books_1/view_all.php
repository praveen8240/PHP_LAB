<?php
if (!isset($_COOKIE['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = $_POST["filter"];
    $value = $_POST["value"];
    $books = json_decode(file_get_contents("books.json"), true);
    foreach ($books as $book) {
        if ($book[$key] == $value) {
            echo "<pre>"; print_r($book); echo "</pre>";
        }
    }
}
?>

<form method="post">
    Filter by:
    <select name="filter">
        <option value="branch">Branch</option>
        <option value="author">Author</option>
        <option value="publisher">Publisher</option>
    </select><br>
    Value: <input name="value"><br>
    <input type="submit" value="Filter Books">
</form>
