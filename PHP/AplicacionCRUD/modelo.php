<?php 
require_once "conexion.php";

function insertarHeroe($nombre,$imagen,$descripcion,$editorial)
{
	$mysql = conexionMySQL();
	$sql = "INSERT INTO heroes (id_heroe,nombre,imagen,descripcion,editorial) VALUES (0,'$nombre','$imagen','$descripcion',$editorial)";

	if($resultado = $mysql->query($sql))
	{
		$respuesta = "<div class='exito' data-recargar>Se insertó con éxito el registro del Superhéroe: <b>$nombre</b></div>";
	}
	else
	{
		$respuesta = "<div class='error'>Ocurrió un error NO se insertó el registro del Superhéroe: <b>$nombre</b></div>";
	}
	$mysql->close();
	return printf($respuesta);
}

function eliminarHeroe($id)
{
	$mysql = conexionMySQL();
	$sql = "DELETE FROM heroes WHERE id_heroe=$id";

	if($resultado = $mysql->query($sql))
	{
		$respuesta = "<div class='exito' data-recargar>Se eliminó con éxito el registro del Superhéroe con el id: <b>$id</b></div>";
	}
	else
	{
		$respuesta = "<div class='error'>Ocurrió un error NO se eliminó el registro del Superhéroecon el id: <b>$id</b></div>";
	}
	$mysql->close();
	return printf($respuesta);
}

function actualizarHeroe($idHeroe,$nombre,$imagen,$descripcion,$editorial)
{
	$mysql = conexionMySQL();
	$sql = "UPDATE heroes SET nombre = '$nombre', imagen='$imagen', descripcion='$descripcion', editorial=$editorial WHERE id_heroe = $idHeroe";

	if($resultado = $mysql->query($sql))
	{
		$respuesta = "<div class='exito' data-recargar>Se actualizó con éxito el registro del Superhéroe: <b>$nombre</b></div>";
	}
	else
	{
		$respuesta = "<div class='error'>Ocurrió un error NO se actualizó el registro del Superhéroe: <b>$nombre</b></div>";
	}
	$mysql->close();
	return printf($respuesta);
}
?>