<?php
include 'config.php';

$result = $conexion->query("SELECT HostID, Nombre FROM radio_host ORDER BY Nombre");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['HostID']}'>" . htmlspecialchars($row['Nombre']) . "</option>";
}
?>
