<?php
error_reporting(0);

session_start();

$uri = explode('/', $_SERVER['REQUEST_URI']);


$controller = (!isset($uri[2])) ? '' : $uri[2];
$method = (!isset($uri[3])) ? '' : $uri[3];

if ($controller == ''){
    $controller = 'empleados';
}

$controller = ucfirst($controller) . 'Controller';
$fileController = $controller . '.php';

$method = trim($method) == '' ? 'index' : $method;

include_once('controllers/' . $fileController);

$Controller = new $controller();
$Controller->{$method}();

?>