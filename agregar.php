<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
    $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0.00;
    $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

    if ($nombre !== '') {
        $sql = "INSERT INTO productos (nombre, precio, cantidad) VALUES ('$nombre', $precio, $cantidad)";
        if (mysqli_query($conexion, $sql)) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Error al insertar: ' . mysqli_error($conexion);
        }
    } else {
        $error = 'El nombre es obligatorio.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Agregar Producto</h2>

<?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>

<form method="post" action="agregar.php">
    <label>Nombre: <input type="text" name="nombre" required></label><br><br>
    <label>Precio: <input type="number" step="0.01" name="precio" required></label><br><br>
    <label>Cantidad: <input type="number" name="cantidad" required></label><br><br>
    <button type="submit">Agregar</button>
</form>

<p><a class="button button--secondary" href="index.php">Volver a la lista</a></p>

</div>
</body>
</html>
