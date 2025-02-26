<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexion->prepare("INSERT INTO radio_host (Nombre, Alias, Experiencia, CabinaID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $_POST['nombre'], $_POST['alias'], $_POST['experiencia'], $_POST['cabinaID']);

    echo $stmt->execute()
        ? "<script>alert('Radio host added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding host.'); window.history.back();</script>";

    $stmt->close();
}
?>