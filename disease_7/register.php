<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST["pid"];
    $pname = $_POST["pname"];
    $disid = $_POST["disid"];
    
    $diseases = json_decode(file_get_contents("diseases.json"), true);
    $disease_name = "";
    foreach ($diseases as $disease) {
        if ($disease["disid"] == $disid) {
            $disease_name = $disease["name"];
            break;
        }
    }
    
    $drid = $_POST["drid"];
    
    $doctors = json_decode(file_get_contents("doctors.json"), true);
    $drname = "";
    foreach ($doctors as $doctor) {
        if ($doctor["drid"] == $drid) {
            $drname = $doctor["name"];
            break;
        }
    }
    
    $patients = json_decode(file_get_contents("patients.json"), true);
    if (!is_array($patients)) {
        $patients = [];
    }
    
    $patients[] = [
        "pid" => $pid,
        "pname" => $pname,
        "disid" => $disid,
        "disease_name" => $disease_name,
        "drid" => $drid,
        "drname" => $drname
    ];
    
    file_put_contents("patients.json", json_encode($patients, JSON_PRETTY_PRINT));
    
    echo "<p>Patient registered successfully!</p>";
}

$doctors = json_decode(file_get_contents("doctors.json"), true);
if (!is_array($doctors)) {
    $doctors = [];
}

$diseases = json_decode(file_get_contents("diseases.json"), true);
if (!is_array($diseases)) {
    $diseases = [];
}
?>

<body>
    <h1>Register Patient</h1>
    <form method="post">
        <div>
            <label>Patient ID:</label>
            <input type="text" name="pid" required>
        </div>
        <div>
            <label>Patient Name:</label>
            <input type="text" name="pname" required>
        </div>
        <div>
            <label>Disease:</label>
            <select name="disid" required>
                <option value="">Select Disease</option>
                <?php foreach ($diseases as $disease): ?>
                <option value="<?php echo $disease['disid']; ?>"><?php echo $disease['name']; ?> (<?php echo $disease['disid']; ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>Doctor:</label>
            <select name="drid" required>
                <option value="">Select Doctor</option>
                <?php foreach ($doctors as $doctor): ?>
                <option value="<?php echo $doctor['drid']; ?>"><?php echo $doctor['name']; ?> - <?php echo $doctor['specialization']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
    <p><a href="index.php">Back to Home</a></p>
</body>
