<?php

class Conexion{
	
	private static $servidor	= "localhost";
	private static $usuario		= "desarrollo_app";
	private static $pwd			= "12345";
	private static $port 		= "3306";
	private static $sid			= "azteka";
	private static $driver 		= "mysqli";

	function Conectarse(){
		
		$ConnAdoDb = ADONewConnection(self::$driver);
//			$ConnAdoDb->debug = true;
		$ConnAdoDb->Connect(self::$servidor, self::$usuario, self::$pwd, self::$sid);
		 # linea para colocar acentos y Ñ
			$ConnAdoDb->EXECUTE("set names 'utf8'");
		if (!$ConnAdoDb){
			print $ConnAdoDb->ErrorMsg();
			exit;
		}else{
			//print " <br> Conectando a la base de datos <br>".$conAdodb." <br>";
		}
		return $ConnAdoDb;
	}

	public function EjecutaConsulta($query){
		$conOra = self::Conectarse();
		//mysql_query("SET NAMES 'utf8'");
		//$cadena = ereg_replace(";"," ",$query); // Solo por si nos tratan de inyectar SQL
		$result = $conOra->Execute($query) or die ("Error in query: 33. $cadena" . $conOra->ErrorMsg());
		return $result;
	}
	
	public function NumConsulta($query){
		$conOra = self::Conectarse();
		//$cadena = ereg_replace(";"," ",$query); // Solo por si nos tratan de inyectar SQL
		$result = $conOra->Execute($query) or die ("Error in query: 41. $cadena" . $conOra->ErrorMsg());
		$numFilas = $result->RecordCount(); /* contamos el total de registros de resultado */
		return $numFilas;
	}
}
// ************ NO EDITAR ESTA SECCION ************ //

// Define el valor de booleanos, depende el manejador que se use 
define('TRUE','t');
define('FALSE','f');

// para el semaforo
define('EN_TIEMPO',8);
define('ALERTA',9);
define('CRITICO',10);

// Nos aseguramos que el TimeZone sea el correcto
date_default_timezone_set('America/Mexico_City');
?>