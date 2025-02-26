<?php
include 'config.php';

$result = $conexion->query("SELECT ID, CONCAT(Onda, ' ', Valor) AS Frecuencia FROM frecuencia ORDER BY Valor");

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['ID']}'>" . htmlspecialchars($row['Frecuencia']) . "</option>";
}
?>