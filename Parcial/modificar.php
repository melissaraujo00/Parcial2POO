<?php
include_once('conexion.php');
$id= isset($_GET['id']) ? $_GET['id']: "";

$conexion->conectar();
$registros = $gestion->selectupdate($id); 
foreach($registros as $filas){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Editar</title>
</head>
<body>
    <h2>Modificacion de Producto</h2>
    <br><br>
    <form action="conexion.php" method="post"><br>
        <label for="">Codigo</label><br>
        <input type="text" name="id" id="" value="<?php echo $filas['id'];?>" hidden><br>
        <input type="text" name="bandera" id="" value="2" hidden>
        <input type="text" name="codigo" id="" value="<?php echo $filas['codigo'];?>"><br>
        <label for="">Nombre</label> <br>
        <input type="text" name="nombre" id="" value="<?php echo $filas['nombre'];?>"><br>
        <label for="">Talla/ Modelo</label><br>
        <input type="text" name="talla_modelo" id="" value="<?php echo $filas['talla_modelo'];?>"><br>
        <label for="">Color</label><br>
        <input type="text" name="color" id="" value="<?php echo $filas['color'];?>"><br><br> 
        <label for="">Precio Unitario</label><br>
        <input type="text" name="precio_unitario" id="" value="<?php echo $filas['precio_unitario'];?>"><br><br>
        <label for="">Cantidad</label><br>
        <input type="text" name="cantidad" id="" value="<?php echo $filas['cantidad'];?>"><br><br>
        <label for="">Categoria</label><br>
        <input type="text" name="categoria" id="" value="<?php echo $filas['categoria'];?>"><br><br>
        <input type="submit" value="enviar">
        <a href="index.php" class='btn'>Regresar</a>
    </form>

    <?php
}
?>
</body>
</html
