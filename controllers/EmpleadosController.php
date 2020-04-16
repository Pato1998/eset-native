<?php
include_once('core/Controller.php');
include_once('models/Empleado.php');
include_once('models/TipoEmpleado.php');
include_once('models/TipoEspecialidad.php');
include_once('models/Especialidad.php');
include_once('models/Empresa.php');

class EmpleadosController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $Empleado = new Empleado($this->conexion);
        $TipoEmpleado = new TipoEmpleado($this->conexion);
        $TipoEspecialidad = new TipoEspecialidad($this->conexion);

        if (isset($_GET['empleado_id']) && is_numeric($_GET['empleado_id'])){
            $empleado_id = $_GET['empleado_id'];
            $empleados[] = $Empleado->getById($empleado_id);
        }else{
            $empleados = $Empleado->getAll();
        }

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
        $this->conexion->beginTransaction();

        try{
            $Empleado = new Empleado($this->conexion);
            $Empleado->setNombre($_POST['nombre']);
            $Empleado->setApellido($_POST['apellido']);
            $Empleado->setEdad($_POST['edad']);
            $Empleado->setEmpresaId($_POST['empresa_id']);
            $Empleado->setTipoEmpleadoId($_POST['tipo_empleado_id']);

            $Empleado->save();
            $Empleado->setId($Empleado->lastId());


            $TipoEspecialidad = new TipoEspecialidad($this->conexion);
            $TipoEspecialidad->setEmpleadoId($Empleado->getId());
            $TipoEspecialidad->setTipoEmpleadoId($Empleado->getTipoEmpleadoId());
            $TipoEspecialidad->setEspecialidadId($_POST['especialidad_id']);
            
            $TipoEspecialidad->save();  
            $TipoEspecialidad->setId($TipoEspecialidad->lastId());
            
            $Empleado->setTipoEspecialidadId($TipoEspecialidad->getId());
            $Empleado->update();

            $this->conexion->commit();

            $_SESSION['msg'] = 'Registrado con exito';
            
            header('location:index');
        }catch(Exception $ex){
            $this->conexion->rollback();
            $_SESSION['msg'] = 'Ocurrio un error';
        }
    }

    public function getPromedioEdad(){
        $Empleado = new Empleado($this->conexion);
        $promedio = $Empleado->getPromedioEdad();

        echo json_encode($promedio);
    }
}

?>