<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nombre'], $_POST['AirTime'], $_POST['DuracionMinutos'], $_POST['FrecuenciaID'], $_POST['HostID'])) {
    $Nombre = $conexion->real_escape_string($_POST['Nombre']);
    $AirTime = $conexion->real_escape_string($_POST['AirTime']);
    $DuracionMinutos = (int)$_POST['DuracionMinutos'];
    $FrecuenciaID = (int)$_POST['FrecuenciaID'];
    $HostID = (int)$_POST['HostID'];

    $stmt = $conexion->prepare("INSERT INTO programas (Nombre, AirTime, DuracionMinutos, FrecuenciaID, HostID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $Nombre, $AirTime, $DuracionMinutos, $FrecuenciaID, $HostID);

    echo $stmt->execute()
        ? "<script>alert('Program added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding program.'); window.history.back();</script>";

    $stmt->close();
}
?>