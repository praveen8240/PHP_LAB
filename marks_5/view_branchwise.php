<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['branch'])) {
    $branch = $_GET['branch'];
    $results = json_decode(file_get_contents("results.json"), true);
    $found = false;

    echo "<h2>Branch-wise Records for $branch</h2>";

    foreach ($results as $result) {
        if ($result['branch'] == $branch) {
            echo "Roll Number: " . $result['rno'] . "<br>";
            echo "Subject 1: " . $result['subname1'] . " (Grade: " . $result['grade1'] . ", Grade Value: " . $result['gradeValue1'] . ")<br>";
            echo "Subject 2: " . $result['subname2'] . " (Grade: " . $result['grade2'] . ", Grade Value: " . $result['gradeValue2'] . ")<br>";
            echo "Subject 3: " . $result['subname3'] . " (Grade: " . $result['grade3'] . ", Grade Value: " . $result['gradeValue3'] . ")<br>";
            echo "SGPA: " . $result['sgpa'] . "<br><hr>";
            $found = true;
        }
    }

    if (!$found) {
        echo "No records found for branch: $branch";
    }
}
?>

<form method="get">
    Enter Branch: <input type="text" name="branch" required><br>
    <input type="submit" value="View Branch Records">
</form>
