<?php
include_once('models/Model.php');
include_once('models/Type.php');

class TipoEmpleado extends Type{
    
    public function __construct($cn){
        parent::__construct('tipo_empleado', $cn);
    }
}
?>