<?php
include_once('models/Model.php');

class Especialidad extends Type{
    
    private $tipo_empleado_id;

    public function __construct($cn){
        parent::__construct('especialidades', $cn);
    }

    public function getTipoEmpleadoId(){
        return $this->tipo_empleado_id;
    }

    public function setTipoEmpleadoId($tipo_empleado_id){
        $this->tipo_empleado_id = $tipo_empleado_id;
    }
}
?>