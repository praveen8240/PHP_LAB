<?php
$patients = json_decode(file_get_contents("patients.json"), true);
if (!is_array($patients)) {
    $patients = [];
}

$filtered_patients = $patients;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filter_type = $_POST["filter_type"];
    $filter_value = $_POST["filter_value"];
    
    if ($filter_type == "disease") {
        $filtered_patients = array_filter($patients, function($patient) use ($filter_value) {
            return strtolower($patient["disease_name"]) == strtolower($filter_value);
        });
    } else if ($filter_type == "disid") {
        $filtered_patients = array_filter($patients, function($patient) use ($filter_value) {
            return $patient["disid"] == $filter_value;
        });
    }
}
?>

<body>
    <h1>View Patients</h1>
    
    <form method="post">
        <div>
            <label>Filter by:</label>
            <select name="filter_type">
                <option value="disease">Disease Name</option>
                <option value="disid">Disease ID</option>
            </select>
            <input type="text" name="filter_value" required>
            <button type="submit">Filter</button>
        </div>
    </form>
    
    <h2>Patient List</h2>
    <table>
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Disease ID</th>
            <th>Disease</th>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
        </tr>
        <?php foreach ($filtered_patients as $patient): ?>
        <tr>
            <td><?php echo $patient["pid"]; ?></td>
            <td><?php echo $patient["pname"]; ?></td>
            <td><?php echo $patient["disid"]; ?></td>
            <td><?php echo $patient["disease_name"]; ?></td>
            <td><?php echo $patient["drid"]; ?></td>
            <td><?php echo $patient["drname"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php">Back to Home</a></p>
</body>
