<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexion->prepare("INSERT INTO frecuencia (Onda, Valor) VALUES (?, ?)");
    $stmt->bind_param("sd", $_POST['onda'], $_POST['valor']);

    echo $stmt->execute()
        ? "<script>alert('Frequency added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding frequency.'); window.history.back();</script>";

    $stmt->close();
}
?>