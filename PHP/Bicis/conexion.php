<?php
//una linea
/*
multi
linea
*/
//include("config.php");
//include_once("config.php");
//require "config.php";
require_once "config.php";

function conexionMySQL()
{
	//echo "<h1>Hola Mundo</h1>";
	//phpinfo();
	//$conexion = "<h1>Hola Mundo</h1>";
	//echo $conexion;

	//$nombre = "jonathan";
	//echo "Hola ".$nombre;

	$conexion = new mysqli(SERVER,USER,PASS,DB);

	if($conexion->connect_error)
	{
		//echo "Error de Conexión N°".$conexion->connect_errno;
	}
	else
	{
		//echo "Conectado a MySQL";
	}

	$conexion->query("SET CHARACTER SET UTF8");
	
	return $conexion;
}

//conexionMySQL();
?>