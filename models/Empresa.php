<?php
include_once('models/Type.php');

class Empresa extends Type{

    public function __construct($cn){
        parent::__construct('empresas', $cn);
    }
}

?>