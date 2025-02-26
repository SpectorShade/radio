<?php
include 'config.php';

$result = $conexion->query("SELECT cancionID, Titulo FROM cancion ORDER BY Titulo");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['cancionID']}'>" . htmlspecialchars($row['Titulo']) . "</option>";
}
?>