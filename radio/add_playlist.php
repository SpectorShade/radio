<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ProgramaID'], $_POST['CancionID'], $_POST['Posicion'])) {
    $ProgramaID = (int)$_POST['ProgramaID'];
    $CancionID = (int)$_POST['CancionID'];
    $Posicion = (int)$_POST['Posicion'];

    $stmt = $conexion->prepare("INSERT INTO playlist (ProgramaID, CancionID, Posicion) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $ProgramaID, $CancionID, $Posicion);

    echo $stmt->execute()
        ? "<script>alert('Playlist entry added successfully!'); window.location.href='index.php';</script>"
        : "<script>alert('Error adding playlist entry.'); window.history.back();</script>";

    $stmt->close();
}
?>