<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare('SELECT * FROM productos WHERE id = ?');
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        header('Location: index.php');
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare('UPDATE productos SET nombre = ?, precio = ?, cantidad = ? WHERE id = ?');
    $stmt->execute([$nombre, $precio, $cantidad, $id]);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link rel="stylesheet" href="form.css" type="text/css">
</head>
<body>
    <div class="body-content">
      <div class="module">
        <h2>Editar Producto</h2><br>
        <form class="form" action="editar.php" method="POST">
          <div class="alert alert-error"></div>
          <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
          <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>
          <input type="number" step="any" name="precio" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
          <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required><br>
          <input type="submit" value="Actualizar" name="ctualizar" class="btn btn-block btn-primary" />
        </form>
      </div>
    </div>
</body>
</html>
