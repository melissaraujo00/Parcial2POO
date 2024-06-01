<?php
include_once('conexion.php');

$id = isset($_GET['id']) ? $_GET['id'] : "";

$conexion->conectar();

$registros = $gestion->selectupdate($id);
foreach ($registros as $filas) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Editar</title>
</head>

<body>
    <h2>Modificación de Producto</h2>
    <br><br>
    <form action="conexion.php" method="post">
        <input type="text" name="id" value="<?php echo $filas['id']; ?>" hidden>
        <input type="text" name="bandera" value="4" hidden>

        <label for="">Código:</label>
        <label><?php echo $filas['codigo']; ?></label><br>

        <label for="">Nombre:</label>
        <label><?php echo $filas['nombre']; ?></label> <br>

        <label for="">Talla/Modelo:</label>
        <label><?php echo $filas['talla_modelo']; ?></label> <br>

        <label for="">Color:</label>
        <label><?php echo $filas['color']; ?></label> <br>

        <label for="">Precio Unitario:</label>
        <label><?php echo $filas['precio_unitario']; ?></label> <br>
        
        <input type="text" name="cantidad" value="<?php echo $filas['cantidad']; ?>" hidden>

        <label for="">Categoría:</label>
        <label><?php echo $filas['categoria']; ?></label> <br>
        <br><br>
        <label for="">¿Cuántos productos desea comprar?</label>
        <input type="number" name="compra" id="compra">

        <input type="submit" value="Comprar">
        <a href="index.php" class='btn'>Regresar</a>
    </form>

</body>

</html>
<?php
}
?>
