<?php
include 'config.php';

// List of allowed tables (whitelist to prevent SQL injection)
$allowed_tables = ['genero', 'cancion', 'cabina', 'frecuencia', 'radio_host', 'programa', 'playlist'];

$table = isset($_GET['table']) ? $_GET['table'] : '';

if (!$table || !in_array($table, $allowed_tables)) {
    die("<script>alert('Invalid table!'); window.history.back();</script>");
}

// Read (Display records from any table)
$result = $conexion->query("SELECT * FROM $table");

if (!$result) {
    die("<script>alert('Error fetching data: " . $conexion->error . "'); window.history.back();</script>");
}

echo "<h2>Records from $table</h2>";
echo "<table border='1'><tr>";

// Display table headers
$fields = $result->fetch_fields();
foreach ($fields as $field) {
    echo "<th>{$field->name}</th>";
}
echo "<th>Actions</th></tr>";

// Display table data
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "<td>
            <a href='update.php?table=$table&id={$row[array_keys($row)[0]]}'>Edit</a> |
            <a href='delete.php?table=$table&id={$row[array_keys($row)[0]]}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
          </td>";
    echo "</tr>";
}
echo "</table>";

?>
