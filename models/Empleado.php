<?php
include_once('Model.php');

class Empleado extends Model{

    protected $id;
    protected $nombre;
    protected $apellido;
    protected $edad;
    protected $empresa_id;
    protected $tipo_empleado_id;
    protected $tipo_especialidad_id;
    
    public function __construct($cn){
        parent::__construct('empleados', $cn);
    }

    public function getId(){
        return $this->id;
    }


    public function getNombre(){
        return $this->nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    

    public function getEdad(){
        return $this->edad;
    }

    public function getEmpresaId(){
        return $this->empresa_id;
    }

    public function getTipoEmpleadoId(){
        return $this->tipo_empleado_id;
    }

    public function getTipoEspecialidadId(){
        return $this->tipo_especialidad_id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function setEmpresaId($empresa_id){
        $this->empresa_id = $empresa_id;
    }

    public function setTipoEmpleadoId($tipo_empleado_id){
        $this->tipo_empleado_id = $tipo_empleado_id;
    }

    public function setTipoEspecialidadId($tipo_especialidad_id){
        $this->tipo_especialidad_id = $tipo_especialidad_id;
    }

    public function save() {
        $sql = 'insert into ' . $this->table . '(nombre, apellido, edad, empresa_id, tipo_empleado_id) values(?, ?, ?, ?, ?)';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->apellido);
        $stmt->bindParam(3, $this->edad);
        $stmt->bindParam(4, $this->empresa_id);
        $stmt->bindParam(5, $this->tipo_empleado_id);
        $stmt->execute();
    }

}

?>