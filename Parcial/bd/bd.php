<?php
class ConexionaBD{
 
    private $server;
    private $usuario;
    private $password;
    private $db;
    public $conexion;

    public function __construct($server, $usuario, $password, $db){
        $this->server = $server;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->db = $db;
        $this->conexion = null;

    }
    public function conectar(){
        $this->conexion = new mysqli($this->server, $this->usuario, $this->password, $this->db);
        if ($this->conexion->connect_error) {
                die("Conexion a la base de datos mal".$this->conexion->connect_error);
        }else{

        }
                
    }

    public function desconectar(){
        if ($this->conexion=== null) {
                # code...
        }else{
            $this->conexion->close();
            //echo "se cerro la conexion";
        }

    }

}

$conexion = new ConexionaBD('localhost', 'root', '', 'tienda');

?>