<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['artista'], $_POST['releaseYear'], $_POST['generoID'])) {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $artista = $conexion->real_escape_string($_POST['artista']);
    $album = isset($_POST['album']) ? $conexion->real_escape_string($_POST['album']) : '';
    $releaseYear = (int)$_POST['releaseYear'];
    $generoID = (int)$_POST['generoID'];

    $stmt = $conexion->prepare("INSERT INTO cancion (Titulo, Artista, Album, AnioLanzamiento, GeneroID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $titulo, $artista, $album, $releaseYear, $generoID);

    if ($stmt->execute()) {
        echo "<script>alert('Song added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error adding song.'); window.history.back();</script>";
    }

    $stmt->close();
}
?>