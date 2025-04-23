<?php
if (!isset($_COOKIE['user'])) {
    echo "Please login first.";
    exit();
}

$results = json_decode(file_get_contents("results.json"), true);

echo "<h2>All Student Records</h2>";
foreach ($results as $result) {
    echo "Roll Number: " . $result['rno'] . "<br>";
    echo "Branch: " . $result['branch'] . "<br>";
    echo "Subject 1: " . $result['subname1'] . " (Grade: " . $result['grade1'] . ", Grade Value: " . $result['gradeValue1'] . ")<br>";
    echo "Subject 2: " . $result['subname2'] . " (Grade: " . $result['grade2'] . ", Grade Value: " . $result['gradeValue2'] . ")<br>";
    echo "Subject 3: " . $result['subname3'] . " (Grade: " . $result['grade3'] . ", Grade Value: " . $result['gradeValue3'] . ")<br>";
    echo "SGPA: " . $result['sgpa'] . "<br><hr>";
}
?>

<a href="index.php">Home</a><br>
<a href="logout.php">Logout</a>
