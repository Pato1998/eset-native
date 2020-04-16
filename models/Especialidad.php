<?php
include_once('models/Type.php');

class Especialidad extends Type{
    
    protected $tipo_empleado_id;

    public function __construct($cn){
        parent::__construct('especialidades', $cn);
    }

    public function getTipoEmpleadoId(){
        return $this->tipo_empleado_id;
    }

    public function setTipoEmpleadoId($tipo_empleado_id){
        $this->tipo_empleado_id = $tipo_empleado_id;
    }

    public function getEspecialidadesPorTipoEmpleado(){
        $sql = 'select * from ' . $this->table . ' where tipo_empleado_id = ?';
        return $this->executeQuery($sql, [$this->tipo_empleado_id]);
    }
}   
?>