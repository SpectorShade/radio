<?php
include 'config.php';

$result = $conexion->query("SELECT cabinaID, Nombre FROM cabina ORDER BY Nombre");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['cabinaID']}'>" . htmlspecialchars($row['Nombre']) . "</option>";
}
?>