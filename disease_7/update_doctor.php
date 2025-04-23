<?php
$doctors = json_decode(file_get_contents("doctors.json"), true);
if (!is_array($doctors)) {
    $doctors = [];
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["search"])) {
        $disid = $_POST["disid"];
        $found = false;
        foreach ($doctors as $key => $doctor) {
            if (in_array($disid, $doctor["disease_ids"])) {
                $found = true;
                $doctor_to_update = $doctor;
                $doctor_index = $key;
                break;
            }
        }
        if (!$found) {
            $message = "No doctor found for this disease ID.";
        }
    } else if (isset($_POST["update"])) {
        $drid = $_POST["drid"];
        $name = $_POST["name"];
        $specialization = $_POST["specialization"];
        $disease_ids = explode(",", $_POST["disease_ids"]);
        
        foreach ($doctors as $key => $doctor) {
            if ($doctor["drid"] == $drid) {
                $doctors[$key] = [
                    "drid" => $drid,
                    "name" => $name,
                    "specialization" => $specialization,
                    "disease_ids" => array_map('trim', $disease_ids)
                ];
                break;
            }
        }
        
        file_put_contents("doctors.json", json_encode($doctors, JSON_PRETTY_PRINT));
        $message = "Doctor updated successfully.";
        
        $patients = json_decode(file_get_contents("patients.json"), true);
        if (is_array($patients)) {
            foreach ($patients as $key => $patient) {
                if ($patient["drid"] == $drid) {
                    $patients[$key]["drname"] = $name;
                }
            }
            file_put_contents("patients.json", json_encode($patients, JSON_PRETTY_PRINT));
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Doctor</title>
</head>
<body>
    <h1>Update Doctor</h1>
    
    <?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <?php if (!isset($doctor_to_update)): ?>
    <form method="post">
        <div>
            <label>Enter Disease ID:</label>
            <input type="text" name="disid" required>
            <button type="submit" name="search">Search</button>
        </div>
    </form>
    <?php else: ?>
    <form method="post">
        <div>
            <label>Doctor ID:</label>
            <input type="text" name="drid" value="<?php echo $doctor_to_update['drid']; ?>" readonly>
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $doctor_to_update['name']; ?>" required>
        </div>
        <div>
            <label>Specialization:</label>
            <input type="text" name="specialization" value="<?php echo $doctor_to_update['specialization']; ?>" required>
        </div>
        <div>
            <label>Disease IDs (comma separated):</label>
            <input type="text" name="disease_ids" value="<?php echo implode(',', $doctor_to_update['disease_ids']); ?>" required>
        </div>
        <div>
            <button type="submit" name="update">Update</button>
        </div>
    </form>
    <?php endif; ?>
    
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>