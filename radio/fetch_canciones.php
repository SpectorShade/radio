<?php
include 'config.php';

$result = $conexion->query("SELECT ID, Titulo FROM cancion ORDER BY Titulo");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['ID']}'>" . htmlspecialchars($row['Titulo']) . "</option>";
}
?>