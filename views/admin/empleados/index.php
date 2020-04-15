<?php include_once(__DIR__ . '/../header.php') ?>


<div class="container text-center">

<h2 class="mt-4">Empleados</h2>

<a href="create" class="btn btn-primary btn-sm float-left mb-4">+ Agregar empleado</a>
<button id="btnPromedioEdad" class="btn btn-success btn-sm float-left mb-4 ml-2">Ver promedio de edad</button>

<form action="empleados/buscar" type="GET">
  <div class="form-group col-sm-4 float-right d-flex flex-row">
      <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="ID de empleado" required>
      <button class="btn btn-success ml-2">Buscar</button>
  </div>
</form>

<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Tipo de empleado</th>
      <th scope="col">Especialidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($empleados as $empleado){
      echo '<tr>
                <td>'. $empleado->getId().'</td>
                <td>'. $empleado->getNombre().'</td>
                <td>'. $empleado->getApellido() .'</td>
                <td>'. $empleado->getEdad() .'</td>
                <td>'. $TipoEmpleado->getById($empleado->getTipoEmpleadoId())->getNombre().'</td>
                <td>'. $Especialidad->getById($empleado->getTipoEspecialidadId())->getNombre().'</td>
            </tr>';
    }
    ?>
  </tbody>
</table>

<?php include_once(__DIR__ . '/../footer.php') ?>


















