<?php 
//echo $_POST["saludo"]." que hacen ? =D";
require "vistas.php";
require "modelo.php";

$transaccion = $_POST["transaccion"];

/*
Aplicación CreateReadUpdateDelete
PHP tiene 2 métodos de envío de datos: POST y GET

Create  Afecta BD     INSERT (SQL)  POST  Modelo
Read    No Afecta BD  SELECT (SQL)  GET   Vista
Update  Afecta BD     UPDATE (SQL)  POST  Modelo
Delete  Afecta BD     DELETE (SQL)  POST  Modelo
*/

function ejecutarTransaccion($transaccion)
{
	//echo $transaccion;
	if($transaccion=="alta")
	{
		//Mostrar un formulario para dar de alta - VISTA
		altaBici();
	}
	else if($transaccion=="insertar")
	{
		//Insertar el registro en la BD - MODELO
		insertarBici(
			$_POST["nombre_txt"],
			$_POST["marca_slc"]
		);
	}
	else if($transaccion=="eliminar")
	{
		//Eliminar un registro de la BD - MODELO
		eliminarBici($_POST["idBici"]);
	}
	else if($transaccion=="editar")
	{
		//Solicitar un formulario con los datos a editar - VISTA
		editarBici($_POST["idBici"]);
	}
	else if($transaccion=="actualizar")
	{
		//Actualizar el registro en la BD - MODELO
		actualizarBici(
			$_POST["idBici"],
			$_POST["nombre_txt"],
			$_POST["marca_slc"]
		);
	}
}

ejecutarTransaccion($transaccion);
?>