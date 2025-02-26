<?php
include 'config.php';

$result = $conexion->query("SELECT GeneroID, Nombre FROM genero ORDER BY Nombre");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['GeneroID']}'>" . htmlspecialchars($row['Nombre']) . "</option>";
}
?>