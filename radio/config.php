<?php
$host = "sql306.infinityfree.com"; 
$user = "if0_38238326";
$pass = "ajzFCRUmYgyIOa";
$dbname = "if0_38238326_radio";

$conexion = new mysqli($host, $user, $pass, $dbname);

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
} else {
    echo "Connected successfully!";
}
?>
