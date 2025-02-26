<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $descripcion = isset($_POST['descripcion']) ? $conexion->real_escape_string($_POST['descripcion']) : '';

    $sql = "INSERT INTO genero (Nombre, Descripcion) VALUES ('$nombre', '$descripcion')";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('Genre added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conexion->error . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid form submission.'); window.history.back();</script>";
}
?>
