<?php
include("conexion.php");

$registros = 5;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina-1)*$registros;

$sql = "SELECT * FROM productos LIMIT $inicio,$registros";
$resultado = mysqli_query($conexion,$sql);

$total = mysqli_query($conexion,"SELECT * FROM productos");
$num_total = mysqli_num_rows($total);
$paginas = ceil($num_total/$registros);
$numero = $inicio + 1;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultar y Modificar Productos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Lista de Productos</h2>

<div class="top-bar">
    <div>
        <p class="description">Administra tus productos con facilidad: agrega, edita o elimina entradas desde esta tabla.</p>
    </div>
    <a class="button button--primary" href="agregar.php">Agregar producto</a>
</div>

<div class="table-wrapper">
<table class="data-table">
<tr>
    <th>#</th>
    <th>Producto</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Acciones</th>
</tr>

<?php
while($fila=mysqli_fetch_assoc($resultado)){
?>
<tr>
    <td><?php echo $numero++; ?></td>
    <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td><?php echo $fila['cantidad']; ?></td>
    <td class="actions">
        <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> |
        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
    </td>
</tr>
<?php
}
?>

</table>
</div>

<div class="pagination">
<?php

for($i=1;$i<=$paginas;$i++){
    echo "<a class='page-link' href='index.php?pagina=$i'>$i</a> ";
}
?>

</div>
</body>
</html>