<?php
include_once('core/Controller.php');
include_once('models/Empleado.php');
include_once('models/TipoEmpleado.php');
include_once('models/Especialidad.php');
include_once('models/Empresa.php');

class EmpleadosController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
       
        $Empleados = new Empleado($this->conexion);
        $TipoEmpleado = new TipoEmpleado($this->conexion);
        $Especialidad = new Especialidad($this->conexion);
        
        $empleados = $Empleados->getAll();

        include_once('views/admin/empleados/index.php');
    }

    public function create(){
       $Empresas = new Empresa($this->conexion);
       $TipoEmpleado = new TipoEmpleado($this->conexion);

       $empresas = $Empresas->getAll();
       $tipoEmpleados = $TipoEmpleado->getAll();

       include_once('views/admin/empleados/create.php');

    }

    public function store(){
        

    }

    public function update(){

    }
}

?>