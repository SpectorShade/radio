<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['alias'], $_POST['experiencia'], $_POST['cabinaID'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $alias = $conexion->real_escape_string($_POST['alias']);
    $experiencia = (int)$_POST['experiencia'];
    $cabinaID = (int)$_POST['cabinaID'];

    $stmt = $conexion->prepare("INSERT INTO radio_host (Nombre, Alias, Experiencia, CabinaID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $nombre, $alias, $experiencia, $cabinaID);

    echo $stmt->execute()
        ? "<script>alert('Radio host added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding radio host.'); window.history.back();</script>";

    $stmt->close();
}
?>