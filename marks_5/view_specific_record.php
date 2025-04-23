<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['rno'])) {
    $rno = $_GET['rno'];
    $results = json_decode(file_get_contents("results.json"), true);
    $found = false;

    foreach ($results as $result) {
        if ($result['rno'] == $rno) {
            echo "<h2>Student Record</h2>";
            echo "Roll Number: " . $result['rno'] . "<br>";
            echo "Branch: " . $result['branch'] . "<br>";
            echo "Subject 1: " . $result['subname1'] . " (Grade: " . $result['grade1'] . ", Grade Value: " . $result['gradeValue1'] . ")<br>";
            echo "Subject 2: " . $result['subname2'] . " (Grade: " . $result['grade2'] . ", Grade Value: " . $result['gradeValue2'] . ")<br>";
            echo "Subject 3: " . $result['subname3'] . " (Grade: " . $result['grade3'] . ", Grade Value: " . $result['gradeValue3'] . ")<br>";
            echo "SGPA: " . $result['sgpa'] . "<br>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "No student found with Roll Number: $rno";
    }
}
?>

<form method="get">
    Enter Roll Number: <input type="text" name="rno" required><br>
    <input type="submit" value="View Student">
</form>
