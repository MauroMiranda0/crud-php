<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare('DELETE FROM productos WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
