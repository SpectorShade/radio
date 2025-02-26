<?php
include 'config.php';

$result = $conexion->query("SELECT FrecuenciaID, CONCAT(onda, ' ', valor) AS Frecuencia FROM frecuencia ORDER BY valor");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['FrecuenciaID']}'>" . htmlspecialchars($row['Frecuencia']) . "</option>";
}
?>