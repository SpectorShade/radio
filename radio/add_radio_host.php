<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nombre'], $_POST['Alias'], $_POST['Experiencia'], $_POST['cabinaID'])) {
    $Nombre = $conexion->real_escape_string($_POST['Nombre']);
    $Alias = $conexion->real_escape_string($_POST['Alias']);
    $Experiencia = (int)$_POST['Experiencia'];
    $cabinaID = (int)$_POST['cabinaID'];

    $stmt = $conexion->prepare("INSERT INTO radio_host (Nombre, Alias, Experiencia, cabinaID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $Nombre, $Alias, $Experiencia, $cabinaID);

    echo $stmt->execute()
        ? "<script>alert('Radio host added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding radio host.'); window.history.back();</script>";

    $stmt->close();
}
?>