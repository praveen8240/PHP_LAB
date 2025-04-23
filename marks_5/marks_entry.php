<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $_POST;
    $results = json_decode(file_get_contents("results.json"), true);

    $results[] = $result; // Add the new student record to the results
    file_put_contents("results.json", json_encode($results));

    echo "Marks entry successful!";
}
?>

<h2>Enter Student Marks</h2>
<form method="post">
    Roll Number: <input type="text" name="rno" required><br>
    Branch: <input type="text" name="branch" required><br>
    
    Subject 1 Code: <input type="text" name="subcode1" required><br>
    Subject 1 Name: <input type="text" name="subname1" required><br>
    Grade 1: <input type="text" name="grade1" required><br>
    Grade Value 1: <input type="number" name="gradeValue1" step="0.1" required><br>
    
    Subject 2 Code: <input type="text" name="subcode2" required><br>
    Subject 2 Name: <input type="text" name="subname2" required><br>
    Grade 2: <input type="text" name="grade2" required><br>
    Grade Value 2: <input type="number" name="gradeValue2" step="0.1" required><br>
    
    Subject 3 Code: <input type="text" name="subcode3" required><br>
    Subject 3 Name: <input type="text" name="subname3" required><br>
    Grade 3: <input type="text" name="grade3" required><br>
    Grade Value 3: <input type="number" name="gradeValue3" step="0.1" required><br>

    SGPA: <input type="number" name="sgpa" step="0.1" required><br>

    <input type="submit" value="Submit">
</form>
