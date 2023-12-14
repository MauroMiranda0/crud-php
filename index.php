<?php
include 'conexion.php';

// Mostrar lista de productos
$stmt = $conn->prepare('SELECT * FROM productos');
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="form.css" type="text/css">
</head>
<body>
  <div class="body-content">
    <div class="module">
      <h2>Agregar Producto</h2><br>
      <form class="form" action="crear.php" method="POST">
        <div class="alert alert-error"></div>
        <input type="text" placeholder="Nombre" name="nombre" required />
        <input type="number" step="any" placeholder="Precio" name="precio" required />
        <input type="number" placeholder="Cantidad" name="cantidad" required />
        <input type="submit" value="Agregar" name="agregar" class="btn btn-block btn-primary" />
      </form>
    </div>
<!--
<form action="crear.php" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label>Precio:</label>
    <input type="number" name="precio" required><br>
    <label>Cantidad:</label>
    <input type="number" name="cantidad" required><br>
    <input type="submit" value="Agregar">
</form>
-->
    <h1>Lista de Productos</h1>
    <table class="tabla">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $producto['id']; ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
</body>
</html>
