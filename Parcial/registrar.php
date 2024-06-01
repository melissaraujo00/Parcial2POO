<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Registrar</title>
</head>
<body>
    <h2>Registro de Producto</h2>
    <br><br>

    <form action="conexion.php" method="post">
        <label for="">Codigo</label><br>
        <input type="text" name="bandera" id="" value="1" hidden>
        <input type="text" name="codigo" id=""><br>
        <label for="">Nombre</label> <br>
        <input type="text" name="nombre" id=""><br>
        <label for="">Talla/ Modelo</label><br>
        <input type="text" name="talla_modelo" id=""><br>
        <label for="">Color</label><br>
        <input type="text" name="color" id=""><br><br> 
        <label for="">Precio Unitario</label><br>
        <input type="text" name="precio_unitario" id=""><br><br>
        <label for="">Cantidad</label><br>
        <input type="text" name="cantidad" id=""><br><br>
        <label for="">Categoria</label><br>
        <input type="text" name="categoria" id=""><br><br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>