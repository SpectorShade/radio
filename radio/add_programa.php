<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexion->prepare("INSERT INTO programa (Nombre, AirTime, DuracionMinutos, FrecuenciaID, HostID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $_POST['nombre'], $_POST['airtime'], $_POST['duracionMinutos'], $_POST['frecuenciaID'], $_POST['hostID']);

    echo $stmt->execute()
        ? "<script>alert('Program added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding program.'); window.history.back();</script>";

    $stmt->close();
}
?>