<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['airtime'], $_POST['duracionMinutos'], $_POST['FrecuenciaID'], $_POST['HostID'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $airtime = $conexion->real_escape_string($_POST['airtime']);
    $duracionMinutos = (int)$_POST['duracionMinutos'];
    $FrecuenciaID = (int)$_POST['FrecuenciaID'];
    $HostID = (int)$_POST['HostID'];

    $stmt = $conexion->prepare("INSERT INTO programas (Nombre, HoraAire, DuracionMinutos, FrecuenciaID, HostID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $nombre, $airtime, $duracionMinutos, $FrecuenciaID, $HostID);

    echo $stmt->execute()
        ? "<script>alert('Program added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding program.'); window.history.back();</script>";

    $stmt->close();
}
?>
