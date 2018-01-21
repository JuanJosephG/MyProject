<?php
	// All database connection variables
	$db_user="remote";
	$db_password="centos";
	$db_name="noticias";
	$db_server="13.58.55.118";

	$conexion = mysqli_connect($db_server,$db_user,$db_password,$db_name);
	$consulta= '';
	if(!$conexion){
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}else{
		echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
		echo "Información del host: " . mysqli_get_host_info($conexion) . PHP_EOL;
	}

	function laConsulta(){
		global $conexion, $consulta;
		$sql= 'SELECT Id_data,Titulo_data,fecha_data,Contador_data FROM data';
		return $conexion->query($sql); 
	}
?>