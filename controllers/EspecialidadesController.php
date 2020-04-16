<?php
include_once('core/Controller.php');
include_once('models/Especialidad.php');

class EspecialidadesController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function getEspecialidadesPorTipoEmpleado(){
        $tipo_empleado_id = $_GET['tipo_empleado_id'];

        $Especialidad = new Especialidad($this->conexion);
        $Especialidad->setTipoEmpleadoId($tipo_empleado_id);
        $especialidades = $Especialidad->getEspecialidadesPorTipoEmpleado();
        
        echo json_encode($especialidades);
    }

}