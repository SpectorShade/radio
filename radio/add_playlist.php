<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['programaID'], $_POST['cancionID'], $_POST['posicion'])) {
    $programaID = (int)$_POST['programaID'];
    $cancionID = (int)$_POST['cancionID'];
    $posicion = (int)$_POST['posicion'];

    $stmt = $conexion->prepare("INSERT INTO playlist (ProgramaID, CancionID, Posicion) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $programaID, $cancionID, $posicion);

    echo $stmt->execute()
        ? "<script>alert('Playlist entry added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding playlist entry.'); window.history.back();</script>";

    $stmt->close();
}
?>
