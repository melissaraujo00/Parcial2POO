<?php

$bandera = isset($_POST['bandera']) ? $_POST['bandera']: "";
$banderaE= isset($_GET['banderaE']) ? $_GET['banderaE']: "";

$codigo = isset($_POST['codigo']) ? $_POST['codigo']: "";
$nombre = isset($_POST['nombre'])? $_POST['nombre']:"";
$talla_modelo = isset($_POST['talla_modelo']) ? $_POST['talla_modelo']: "" ;
$color = isset($_POST['color']) ? $_POST['color']:"";
$precio_unitario = isset($_POST['precio_unitario']) ? $_POST['precio_unitario']:"";
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad']:"";
$categoria = isset($_POST['categoria']) ? $_POST['categoria']:"";
$compra = isset($_POST['compra']) ? $_POST['compra']:"";

$ids = isset($_POST['id']) ? $_POST['id']:"" ;
$idd= isset($_GET['iddelete']) ? $_GET['iddelete']:"";

include_once('bd/bd.php');

class registrar{
    public $conexion;
    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function select(){
        $consultaSelect = "SELECT * FROM inventario";
        $ejecutar_consulta = $this->conexion->conexion->query($consultaSelect);
        return $ejecutar_consulta->fetch_all(MYSQLI_ASSOC);

    }

    public function insert($datos){
        $campos = implode(',', array_keys($datos));
        $valores = "'".implode("','", array_values($datos)). "'";
        $consulta_insertar = " INSERT INTO inventario($campos) VALUES ($valores)";
        return $this->conexion->conexion->query($consulta_insertar);
    }

    public function selectupdate($id){
        $consultaSelect = "SELECT * FROM inventario WHERE id=$id";
        $ejecutar_consulta = $this->conexion->conexion->query($consultaSelect);
        return $ejecutar_consulta->fetch_all(MYSQLI_ASSOC);

    }

    public function update($id, $datos){
        $set = [];
        foreach ($datos as $campo => $valor){
            $set[]= "$campo = '$valor'";
        }
        $set = implode(',', $set);
        $consulta_actualizar = "UPDATE inventario SET $set WHERE id=$id";
        $resultado = $this->conexion->conexion->query($consulta_actualizar);
        if($resultado){
            return true;
        }else{
            return $this->conexion->conexion->error;
        }
    }

    public function delete($id){
        $consultadelete = "DELETE  FROM inventario WHERE id=$id";
        $ejecutar_delete = $this->conexion->conexion->query($consultadelete);
        return $ejecutar_delete;

    }   

    public function actualizar_existencia($id, $nueva_existencia){
        $consultaExistencias = "UPDATE inventario SET cantidad = $nueva_existencia WHERE id = $id";
        $resultado = $this->conexion->conexion->query($consultaExistencias);
        if($resultado){
            return true;
        } else {
            return false;
        }
    }    
}

$gestion = new registrar($conexion);

if ($bandera == 1) {
    if ($codigo !== '' && $nombre !== '' && $talla_modelo !== '' && $color !== '' && $precio_unitario !== '' && $cantidad !== '' && $categoria !== '') {
        $datosInsert = array(
            'codigo' => $codigo,
            'nombre' => $nombre,
            'talla_modelo' => $talla_modelo,
            'color' => $color,
            'precio_unitario' => $precio_unitario,
            'cantidad' => $cantidad,
            'categoria' => $categoria
        );
        $conexion->conectar();
        $gestion->insert($datosInsert);

        if ($gestion) {
            header('location:index.php');
        }
    } else {
        echo "<script>alert('Por favor, complete todos los campos del formulario.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }    
}else if($bandera == 2){
    if ($codigo !== '' && $nombre !== '' && $talla_modelo !== '' && $color !== '' && $precio_unitario !== '' && $cantidad !== '' && $categoria !== '') {
        $id=$ids;
        $datosUpdate = array(
            'codigo' => $codigo,
            'nombre' => $nombre,
            'talla_modelo' => $talla_modelo,
            'color' => $color,
            'precio_unitario' => $precio_unitario,
            'cantidad' => $cantidad,
            'categoria' => $categoria
        );
        $conexion->conectar();
        $Insert =$gestion->update($id, $datosUpdate);
        if ($Insert) {
            header('location:index.php');
        }
    }else {
        echo "<script>alert('Por favor, complete todos los campos del formulario.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}else if($banderaE == 3){
    $conexion->conectar();
    $delete = $gestion->delete($idd);
    if($delete){
        header("location: index.php");
    }

}else if ($bandera == 4) {
    if ($compra > 0) {
        if ($cantidad >= $compra) {
            
            $id=$ids;
            $nueva_existencia = $cantidad - $compra;

            $conexion->conectar();
            
            $gestion->actualizar_existencia($ids, $nueva_existencia);
            header("Location: index.php"); 
        } else {
            echo "<script>alert('No hay suficiente existencia en el inventario.');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('La cantidad de venta debe ser un número positivo..');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}


?>