<?php
class Model
{
	public $table;
	public $conexion;

	public function __construct($table, $conexion)
	{
		$this->table = $table;
		$this->conexion = $conexion;
	}

	public function closeConexion()
	{
		$this->conexion = null;
	}

	public function getAll()
	{	
		$query = "SELECT * FROM " . $this->table;

		$stmt = $this->conexion->prepare($query);
		$stmt->execute();
		$response = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $this->parseToObject($response);
	}

	public function getById($id)
	{
		$query = "select * from " . $this->table . " where id = " . $id ;

		$stmt = $this->conexion->prepare($query);
		$stmt->execute();
		$response = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return count($response) > 0 ? $this->parseToObject($response)[0] : [];
	}

	public function delete($id)
	{
		try
		{
			//EJECUTA LA ACUTALIZACION

			$query = "UPDATE " . $this->table . " SET ESTADO = 0 WHERE ID = " . $id ;
			$stmt = $this->conexion->prepare($query);
			$stmt->execute();

			//CUENTA LAS FILAS AFECTADAS... VERIFICAR EL VALOR DEVUELTO SI ES IGUAL A 1 SE ACTUALIZO CORRECTAMENTE
			return $stmt->rowCount();

		}catch(PDOException $e)
		{
			echo 'Error ' . $e->getMessage();
		}
	}
	
	public function parseToObject($data = []){
		$objClass = get_called_class();
		$obj = new $objClass($this->conexion);
		$objs = [];
		$props = get_object_vars($obj);		

		foreach($data as $d){

			$obj = new $objClass($this->conexion);

			foreach($props as $prop => $value){
				if ($prop != 'conexion' && $prop != 'table'){
					$ExplodeProp  = explode('_', $prop);
					$auxProp = '';
					foreach($ExplodeProp as $p){
						$auxProp .= ucfirst($p);
					}

					$newProp = 'set' . $auxProp;
					$obj->{$newProp}($d[$prop]);	
				}
			}
			$objs[] = $obj;
		}
		

		return $objs;
	}

	public function executeQuery($query, $params = [], $array = true)
	{
		$stmt = $this->conexion->prepare($query);
		if(count($params) > 0){

			for($i = 0; $i < count($params); $i++){
				$stmt->bindParam(($i + 1), $params[$i]);
			}
		}
		$stmt->execute();

		$response = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		if ($array){
			return $response;
		} else {
			$this->parseToObject($response);
		}
	}

	public function lastId(){
		$sql = 'select id from ' . $this->table . ' order by id desc';
		return $this->executeQuery($sql)[0]['id'];
	}

}

?>