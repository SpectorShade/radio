<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexion->prepare("INSERT INTO cabina (Nombre, Locacion, Capacidad) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['nombre'], $_POST['locacion'], $_POST['capacidad']);

    echo $stmt->execute()
        ? "<script>alert('Booth added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding booth.'); window.history.back();</script>";

    $stmt->close();
}
?>