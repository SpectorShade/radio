<?php
include 'config.php';

if (!isset($_GET['table']) || !isset($_GET['id'])) {
    die("Invalid request.");
}

$table = $conexion->real_escape_string($_GET['table']);
$id = (int) $_GET['id'];
$idColumn = $table . "ID";

// Fetch column names dynamically
$columnsResult = $conexion->query("SHOW COLUMNS FROM `$table`");
$columns = [];

while ($col = $columnsResult->fetch_assoc()) {
    if ($col['Field'] !== $idColumn) { // Skip primary key
        $columns[] = $col['Field'];
    }
}

// Fetch the existing record
$query = "SELECT * FROM `$table` WHERE `$idColumn` = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();

if (!$record) {
    die("Record not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateFields = [];
    $updateValues = [];
    $types = "";

    foreach ($columns as $column) {
        if (isset($_POST[$column])) {
            $updateFields[] = "$column = ?";
            $updateValues[] = $_POST[$column];
            $types .= "s"; // Assuming all fields are strings (adjust if necessary)
        }
    }
    
    $updateValues[] = $id;
    $types .= "i";
    
    $updateQuery = "UPDATE `$table` SET " . implode(", ", $updateFields) . " WHERE `$idColumn` = ?";
    $stmt = $conexion->prepare($updateQuery);
    $stmt->bind_param($types, ...$updateValues);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully!'); window.location.href='read.php?table=$table';</script>";
    } else {
        echo "Error updating record: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>
    <h2>Update Record in <?php echo htmlspecialchars($table); ?></h2>
    <form method="POST">
        <?php foreach ($columns as $column) : ?>
            <label><?php echo htmlspecialchars($column); ?>:</label>
            <input type="text" name="<?php echo htmlspecialchars($column); ?>" value="<?php echo htmlspecialchars($record[$column]); ?>" required><br>
        <?php endforeach; ?>
        <button type="submit">Update</button>
    </form>
</body>
</html>
