<?php
include 'config.php';

$result = $conexion->query("SELECT ID, Nombre FROM genero ORDER BY Nombre");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['ID']}'>" . htmlspecialchars($row['Nombre']) . "</option>";
}
?>