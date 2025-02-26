<?php
include 'config.php';

$result = $conexion->query("SELECT FrecuenciaID, CONCAT(Onda, ' ', Valor) AS Frecuencia FROM frecuencia ORDER BY Valor");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['FrecuenciaID']}'>" . htmlspecialchars($row['Frecuencia']) . "</option>";
}
?>