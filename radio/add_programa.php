<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['airtime'], $_POST['duracionMinutos'], $_POST['frecuenciaID'], $_POST['hostID'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $airtime = $conexion->real_escape_string($_POST['airtime']);
    $duracionMinutos = (int)$_POST['duracionMinutos'];
    $frecuenciaID = (int)$_POST['frecuenciaID'];
    $hostID = (int)$_POST['hostID'];

    $stmt = $conexion->prepare("INSERT INTO programa (Nombre, HoraAire, DuracionMinutos, FrecuenciaID, HostID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $nombre, $airtime, $duracionMinutos, $frecuenciaID, $hostID);

    echo $stmt->execute()
        ? "<script>alert('Program added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding program.'); window.history.back();</script>";

    $stmt->close();
}
?>
