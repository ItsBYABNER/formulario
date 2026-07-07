<?php
include("conexion.php");

$id=$_GET['id'];

if(isset($_POST['guardar'])){

    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];

    $sql="UPDATE productos
          SET nombre='$nombre',
              precio='$precio',
              cantidad='$cantidad'
          WHERE id='$id'";

    mysqli_query($conexion,$sql);

    header("Location: index.php");
exit();
}

$sql="SELECT * FROM productos WHERE id='$id'";
$resultado=mysqli_query($conexion,$sql);
$fila=mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Editar Producto</h2>

<form method="POST">

Nombre:
<input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br><br>

<label>Precio:
    <input type="text" name="precio" value="<?php echo $fila['precio']; ?>">
</label>

<label>Cantidad:
    <input type="number" name="cantidad" value="<?php echo $fila['cantidad']; ?>">
</label>

<input class="button button--primary" type="submit" name="guardar" value="Guardar">
<p><a class="button button--secondary" href="index.php">Volver a la lista</a></p>

</form>

</div>
</body>
</html>