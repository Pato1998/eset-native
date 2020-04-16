<?php
include_once('models/Model.php');
include_once('models/Especialidad.php');

class TipoEspecialidad extends Model{
    
    private $id;
    private $tipo_empleado_id;
    private $especialidad_id;
    private $empleado_id;

    public function __construct($cn){
        parent::__construct('tipo_especialidad', $cn);
    }

    public function getId(){
        return $this->id;
    }

    public function getTipoEmpleadoId(){
        return $this->tipo_empleado_id;
    }

    public function getEspecialidadId(){
        return $this->tipo_especialidad_id;
    }

    public function getEmpeladoId(){
        return $this->empleado_id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTipoEmpleadoId($tipo_empleado_id){
        $this->tipo_empleado_id = $tipo_empleado_id;
    }

    public function setEspecialidadId($especialidad_id){
        $this->especialidad_id = $especialidad_id;
    }

    public function setEmpleadoId($empleado_id){
        $this->empleado_id = $empleado_id;
    }

    public function save(){
        $sql = 'insert into ' . $this->table . ' (tipo_empleado_id, especialidad_id, empleado_id) values(?, ?, ?)';
        $params = [$this->tipo_empleado_id, $this->especialidad_id, $this->empleado_id];
        $this->executeQuery($sql, $params);
    }

    public function getEspecialidad($id){
        $query = "select * from " . $this->table . " where id = " . $id ;
        $response = $this->executeQuery($query, [])[0];

        $especialidad_id = $response['especialidad_id'];

        $Especialidad = new Especialidad($this->conexion);
        return $Especialidad->getById($especialidad_id);
    } 
}
?>