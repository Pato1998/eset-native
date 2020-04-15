<?php
class Conexion
{
	private $driver, $host, $user, $pass, $database, $options;
	private $conexion;

	public function __construct()		
	{
		$db_config = require_once 'config/database.php';

		$this->driver = $db_config["driver"]; 
		$this->host = $db_config["host"]; 
		$this->user = $db_config["user"]; 
		$this->pass = $db_config["pass"]; 
		$this->database = $db_config["database"]; 
		$this->options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
		 PDO::ATTR_EMULATE_PREPARES => false, 
		 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		 PDO::ATTR_PERSISTENT => true
		 );

		 //PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT (Oculta los errores de PDO)
		 //PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, (Manejo de errores PDOException)

	}

	
	public function connect()
	{
		if($this->driver != null)
		{	
			try
			{
				$this->conexion = new PDO($this->driver.':host='.$this->host.';dbname='.$this->database, $this->user, $this->pass, $this->options);

				return $this->conexion;

			}catch(PDOException $e)
			{
				echo "ERROR!";
				//print_r($e);
			}
		}else
		{
			echo "Database undefined";
		}	

	}


}

?>