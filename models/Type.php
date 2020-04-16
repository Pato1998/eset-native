<?php
include_once('models/Model.php');

class Type extends Model{

    protected $id;
    protected $nombre;

    public function __construct($table, $conexion){
        parent::__construct($table, $conexion);
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

}
