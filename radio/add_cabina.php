<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nombre'], $_POST['Locacion'], $_POST['Capacidad'])) {
    $Nombre = $conexion->real_escape_string($_POST['Nombre']);
    $Locacion = $conexion->real_escape_string($_POST['Locacion']);
    $Capacidad = (int)$_POST['Capacidad'];

    $stmt = $conexion->prepare("INSERT INTO cabina (Nombre, Locacion, Capacidad) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $Nombre, $Locacion, $Capacidad);

    echo $stmt->execute()
        ? "<script>alert('Booth added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding booth.'); window.history.back();</script>";

    $stmt->close();
}
?>