<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['locacion'], $_POST['capacidad'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $locacion = $conexion->real_escape_string($_POST['locacion']);
    $capacidad = (int)$_POST['capacidad'];

    $stmt = $conexion->prepare("INSERT INTO cabina (Nombre, Locacion, Capacidad) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $locacion, $capacidad);

    echo $stmt->execute()
        ? "<script>alert('Booth added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding booth.'); window.history.back();</script>";

    $stmt->close();
}
?>
