<?php
$host = 'localhost';
$db   = 'crud_php';
$user = 'root';
$pass = '982109821';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>
