<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexion->prepare("INSERT INTO playlist (ProgramaID, CancionID, Posicion) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $_POST['programaID'], $_POST['cancionID'], $_POST['posicion']);

    echo $stmt->execute()
        ? "<script>alert('Playlist entry added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding playlist entry.'); window.history.back();</script>";

    $stmt->close();
}
?>