<?php
include 'config.php';

$result = $conexion->query("SELECT ProgramaID, Nombre FROM programa ORDER BY Nombre");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['ProgramaID']}'>" . htmlspecialchars($row['Nombre']) . "</option>";
}
?>