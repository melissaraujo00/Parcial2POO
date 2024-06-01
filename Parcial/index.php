<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inventario</title>
</head>
<body>
    
<h2>Bienvenido Inventario</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>CODIGO</th>
        <th>NOMBRE</th>
        <th>TALLA/MODELO</th>
        <th>COLOR</th>
        <th>PRECIO UNITARIO</th>
        <th>CANTIDAD</th>
        <th>CATEGORIA</th>
        <th>ACCIONES</th>
    </tr>
    <?php
    include_once('conexion.php');
    $conexion->conectar();
    $registros = $gestion->select(); 
    foreach($registros as $filas){
        echo "<tr>";
            echo "<td>".$filas['id']."</td>";
            echo "<td>".$filas['codigo']."</td>";
            echo"<td>".$filas['nombre']. "</td>";
            echo"<td>".$filas['talla_modelo']. "</td>";
            echo"<td>".$filas['color']. "</td>";
            echo"<td>".$filas['precio_unitario']. "</td>";
            echo"<td>".$filas['cantidad']. "</td>";
            echo"<td>".$filas['categoria']. "</td>";

            echo "<td > <a href='modificar.php?id=".$filas['id']."' class='btn1'>Modificar</a>
            <a href ='conexion.php?iddelete=".$filas['id']."&banderaE=3' class='btn2'>Eliminar</a>
            <a href='venta.php?id=".$filas['id']."' class='btn3' >Comprar</a>
            </td>";
    }
    ?>
</table>
<br><br>
<a href="registrar.php" class='btn'>Registrar Producto</a>
</body>
</html>

<?php
    $conexion->desconectar();
?>