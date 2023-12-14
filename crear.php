<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare('INSERT INTO productos (nombre, precio, cantidad) VALUES (?, ?, ?)');
    $stmt->execute([$nombre, $precio, $cantidad]);

    header('Location: index.php');
    exit();
}
?>
