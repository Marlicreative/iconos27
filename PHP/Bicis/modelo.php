<?php 
require_once "conexion.php";

function insertarBici($nombre,$marca)
{
	$mysql = conexionMySQL();
	$sql = "INSERT INTO bici (id_bici,nombre,marca) VALUES (0,'$nombre',$marca)";

	if($resultado = $mysql->query($sql))
	{
		$respuesta = "<div class='exito' data-recargar>Se insertó con éxito el registro de la Bici: <b>$nombre</b></div>";
	}
	else
	{
		$respuesta = "<div class='error'>Ocurrió un error NO se insertó el registro de la Bici: <b>$nombre</b></div>";
	}
	$mysql->close();
	return printf($respuesta);
}

function eliminarBici($id)
{
	$mysql = conexionMySQL();
	$sql = "DELETE FROM bici WHERE id_bici=$id";

	if($resultado = $mysql->query($sql))
	{
		$respuesta = "<div class='exito' data-recargar>Se eliminó con éxito el registro de la Bici con el id: <b>$id</b></div>";
	}
	else
	{
		$respuesta = "<div class='error'>Ocurrió un error NO se eliminó el registro de la Bici con el id: <b>$id</b></div>";
	}
	$mysql->close();
	return printf($respuesta);
}

function actualizarBici($idBici,$nombre,$marca)
{
	$mysql = conexionMySQL();
	$sql = "UPDATE bici SET nombre = '$nombre', marca=$marca WHERE id_bici = $idBici";

	if($resultado = $mysql->query($sql))
	{
		$respuesta = "<div class='exito' data-recargar>Se actualizó con éxito el registro de la Bici: <b>$nombre</b></div>";
	}
	else
	{
		$respuesta = "<div class='error'>Ocurrió un error NO se actualizó el registro de la Bici: <b>$nombre</b></div>";
	}
	$mysql->close();
	return printf($respuesta);
}
?>