<?php
$doctors = json_decode(file_get_contents("doctors.json"), true);
if (!is_array($doctors)) {
    $doctors = [];
}

$filtered_doctors = $doctors;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filter_type = $_POST["filter_type"];
    $filter_value = $_POST["filter_value"];
    
    if ($filter_type == "disease") {
        $filtered_doctors = array_filter($doctors, function($doctor) use ($filter_value) {
            return strtolower($doctor["specialization"]) == strtolower($filter_value);
        });
    } else if ($filter_type == "disid") {
        $filtered_doctors = array_filter($doctors, function($doctor) use ($filter_value) {
            return in_array($filter_value, $doctor["disease_ids"]);
        });
    }
}
?>

<body>
    <h1>View Doctors</h1>
    
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
    
    <h2>Doctor List</h2>
    <table>
        <tr>
            <th>Doctor ID</th>
            <th>Name</th>
            <th>Specialization</th>
            <th>Disease IDs</th>
        </tr>
        <?php foreach ($filtered_doctors as $doctor): ?>
        <tr>
            <td><?php echo $doctor["drid"]; ?></td>
            <td><?php echo $doctor["name"]; ?></td>
            <td><?php echo $doctor["specialization"]; ?></td>
            <td><?php echo implode(", ", $doctor["disease_ids"]); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php">Back to Home</a></p>
</body>
