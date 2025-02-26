<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['onda'], $_POST['valor'])) {
    $onda = $conexion->real_escape_string($_POST['onda']);
    $valor = (float)$_POST['valor'];

    $stmt = $conexion->prepare("INSERT INTO frecuencia (onda, valor) VALUES (?, ?)");
    $stmt->bind_param("sd", $onda, $valor);

    echo $stmt->execute()
        ? "<script>alert('Frequency added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding frequency.'); window.history.back();</script>";

    $stmt->close();
}
?>