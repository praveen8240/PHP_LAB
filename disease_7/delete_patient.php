<?php
$patients = json_decode(file_get_contents("patients.json"), true);
if (!is_array($patients)) {
    $patients = [];
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST["pid"];
    
    $found = false;
    foreach ($patients as $key => $patient) {
        if ($patient["pid"] == $pid) {
            $found = true;
            unset($patients[$key]);
            break;
        }
    }
    
    if ($found) {
        $patients = array_values($patients);
        file_put_contents("patients.json", json_encode($patients, JSON_PRETTY_PRINT));
        $message = "Patient deleted successfully.";
    } else {
        $message = "Patient not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Patient</title>
</head>
<body>
    <h1>Delete Patient</h1>
    
    <?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <form method="post">
        <div>
            <label>Enter Patient ID:</label>
            <input type="text" name="pid" required>
            <button type="submit">Delete</button>
        </div>
    </form>
    
    <h2>Current Patients</h2>
    <table>
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Disease ID</th>
            <th>Disease</th>
        </tr>
        <?php foreach ($patients as $patient): ?>
        <tr>
            <td><?php echo $patient["pid"]; ?></td>
            <td><?php echo $patient["pname"]; ?></td>
            <td><?php echo $patient["disid"]; ?></td>
            <td><?php echo $patient["disease_name"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>