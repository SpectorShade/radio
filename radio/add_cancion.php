<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Titulo'], $_POST['Artista'], $_POST['ReleaseYear'], $_POST['GeneroID'])) {
    $Titulo = $conexion->real_escape_string($_POST['Titulo']);
    $Artista = $conexion->real_escape_string($_POST['Artista']);
    $Album = isset($_POST['Album']) ? $conexion->real_escape_string($_POST['Album']) : '';
    $ReleaseYear = (int)$_POST['releaseYear'];
    $GeneroID = (int)$_POST['GeneroID'];

    $stmt = $conexion->prepare("INSERT INTO cancion (Titulo, Artista, Album, ReleaseYear, GeneroID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $Titulo, $Artista, $Album, $ReleaseYear, $GeneroID);

    if ($stmt->execute()) {
        echo "<script>alert('Song added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error adding song.'); window.history.back();</script>";
    }

    $stmt->close();
}
?>