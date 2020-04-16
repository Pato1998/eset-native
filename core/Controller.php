<?php
include_once('core/Conexion.php');

class Controller{

    protected $conexion;

    public function __construct(){
        $cn = new Conexion();
        $this->conexion = $cn->connect();
        include_once('config/global.php');
    }
}
?>