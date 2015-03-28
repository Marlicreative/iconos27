<?php 
require_once "conexion.php";

/*
Pasos Para conectarme a MySQL con PHP
	1)Objeto de Conexión: $mysql = conexionMySQL();
	2)Consulta SQL: $sql = "SELECT * FROM heroes ORDER BY id_heroe DESC";
	3)Ejecutar la consulta: $resultado = $mysql->query($sql)
	4)Mostrar Resultados: $fila=$resultado->fetch_assoc()
*/
/*
MALAS PRÁCTICAS
function catalogoEditoriales($id)
{	
	$mysql = conexionMySQL();
	$sql = "SELECT * FROM editoriales WHERE id_editorial=$id";

	if($resultado=$mysql->query($sql))
	{
		$fila=$resultado->fetch_assoc();
	}
	$resultado->free();
	$mysql->close();
	return $fila["editorial"];
}
*/

function mostrarBicis()
{
	$mysql = conexionMySQL();
	//$sql = "SELECT * FROM heroes ORDER BY id_heroe DESC";
	$sql = "SELECT a.id_bici, a.nombre, b.marca ";
	$sql .= " FROM bici AS a INNER JOIN marcas AS b ";
	$sql .= " ON a.marca = b.id_marca ORDER BY nombre DESC";

	if($resultado = $mysql->query($sql))
	{
		//La consulta SQL se ejecuto
		//echo "Se ejecuto";
		//Si la tan(arg)bla tiene registros los muestro, sino mando un mensaje de que la tabla esta vacia
		$totalRegistros = mysqli_num_rows($resultado);
		//echo $totalRegistros;
		if($totalRegistros==0)
		{
			$respuesta = "<div class='error'>No existe registros de Bicis. La Base de Datos esta vacía.</div>";
		}
		else
		{
			/* INICIA PAGINACIÓN */
				//Limitar mi consulta SQL
				$regXPag = 3;
				$pagina = false;

				//Examinar la página a mostrar y el inicio del registro a mostrar
				if(isset($_GET["p"]))
				{
					$pagina = $_GET["p"];
				}

				if(!$pagina)
				{
					$inicio = 0;
					$pagina = 1;
				}
				else
				{
					$inicio = ($pagina - 1) * $regXPag;
				}

				//calculó el total de páginas
				$totalPaginas = ceil($totalRegistros/$regXPag);

				$sql .= " LIMIT ".$inicio.",".$regXPag;

				echo $sql."<br />".$totalPaginas;

				$resultado = $mysql->query($sql);

				//despliegue de  la paginación
				$paginacion = "<div class='paginacion'>";
					$paginacion .= "<p>";
						$paginacion .= "Número de resultados: <b>$totalRegistros</b>. ";
						$paginacion .= "Mostrando <b>$regXPag</b> resultados por página. ";
						$paginacion .= "Página <b>$pagina</b> de <b>$totalPaginas</b>.";
					$paginacion .= "</p>";

					if($totalPaginas>1)
					{
						$paginacion .= "<p>";
							$paginacion .= ($pagina!=1)?"<a href='?p=".($pagina-1)."'>&laquo</a>":"";
							
							for($i=1;$i<=$totalPaginas;$i++)
							{
								//si muestro el índice de la página actual, no coloco enlace
								$actual = "<span class='actual'>$pagina</span>";
								//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
								$enlace = "<a href='?p=$i'>$i</a>";
								$paginacion .= ($pagina == $i)?$actual:$enlace;
							}
							
							$paginacion .= ($pagina!=$totalPaginas)?"<a href='?p=".($pagina+1)."'>&raquo</a>":"";
						$paginacion .= "</p>";
					}
				$paginacion .= "</div>";
			/* TERMINA PAGINACIÓN */
			//$respuesta = "<div class='exito'>Número de Super Héroes en la BD $totalRegistros</div>";
			$tabla = "<table id='tabla-heroes' class='tabla'>";
			$tabla .= "<thead>";
				$tabla .= "<tr>";
					$tabla .= "<th>Id</th>";
					$tabla .= "<th>Nombre</th>";
					$tabla .= "<th>Marca</th>";
					$tabla .= "<th></th>";
					$tabla .= "<th></th>";
				$tabla .= "</tr>";
			$tabla .= "</thead>";
			$tabla .= "<tbody>";
			while($fila=$resultado->fetch_assoc())
			{
				$tabla .= "<tr>";
					$tabla .= "<td>".$fila["id_bici"]."</td>";
					$tabla .= "<td>".$fila["nombre"]."</td>";
					$tabla .= "<td>".$fila["marca"]."</td>";
					$tabla .= "<td><a href='#' data-id='".$fila["id_bici"]."' class='editar'>Editar</a></td>";
					$tabla .= "<td><a href='#' data-id='".$fila["id_bici"]."' class='eliminar'>Eliminar</a></td>";
				$tabla .= "</tr>";
			}
			$tabla .= "</tbody>";
			$tabla .= "</table>";

			$respuesta = $tabla.$paginacion;
		}
	}
	else
	{
		//La consulta no se ejecuto, hay errores de sintaxis
		//echo "Error en el query";
		$respuesta = "<div class='error'>Error: No se ejecuto la consulta a la Base de Datos</div>";
	}

	return printf($respuesta);
}

function listaMarcas()
{
	$mysql = conexionMySQL();
	$sql = "SELECT * FROM marcas";
	$resultado = $mysql->query($sql);

	$lista = "<select id='marca' name='marca_slc' required>";
		$lista .= "<option value=''>- - -</option>";
		while($fila=$resultado->fetch_assoc())
		{
			//$lista .= "<option value='".$fila["id_editorial"]."'>".$fila["editorial"]."</option>";
			$lista .= sprintf(
				"<option value='%d'>%s</option>",
				$fila["id_marca"],
				$fila["marca"]
			);
		}
	$lista .= "</select>";

	$resultado->free();
	$mysql->close();
	return $lista;
}

function listaMarcasEditada($id)
{
	$mysql = conexionMySQL();
	$sql = "SELECT * FROM marcas";
	$resultado = $mysql->query($sql);

	$lista = "<select id='marca' name='marca_slc' required>";
		$lista .= "<option value=''>- - -</option>";
		while($fila=$resultado->fetch_assoc())
		{
			//$lista .= "<option value='".$fila["id_editorial"]."'>".$fila["editorial"]."</option>";

			$selected = ($id == $fila["id_marca"])?"selected":"";

			$lista .= sprintf(
				"<option value='%d' $selected>%s</option>",
				$fila["id_marca"],
				$fila["marca"]
			);
		}
	$lista .= "</select>";

	$resultado->free();
	$mysql->close();
	return $lista;
}

function altaBici()
{
	$form = "<form id='alta-bici' class='formulario' data-insertar>";
	$form .= "<fieldset>";
		$form .= "<legend>Alta de Bici:</legend>";
		$form .= "<div>";
			$form .= "<label for='nombre'>Nombre:</label>";
			$form .= "<input type='text' id='nombre' name='nombre_txt' required />";
		$form .= "</div>";
		$form .= "<div>";
			$form .= "<label for='marca'>Marcas:</label>";
			$form .= listaMarcas();
		$form .= "</div>";
		$form .= "<div>";
			$form .= "<input type='submit' id='insertar-btn' name='insertar_btn' value='Insertar' />";
			$form .= "<input type='hidden' id='transaccion' name='transaccion' value='insertar' />";
		$form .= "</div>";
	$form .= "</fieldset>";
	$form .= "</form>";

	return printf($form);
}

function editarBici($idBici)
{
	$mysql = conexionMySQL();
	$sql = "SELECT * FROM bici WHERE id_bici=$idBici";

	if($resultado = $mysql->query($sql))
	{
		$fila = $resultado->fetch_assoc();
		
		$form = "<form id='editar-bici' class='formulario' data-editar>";
		$form .= "<fieldset>";
			$form .= "<legend>Edición de Bici:</legend>";
			$form .= "<div>";
				$form .= "<label for='nombre'>Nombre:</label>";
				$form .= "<input type='text' id='nombre' name='nombre_txt' value='".$fila["nombre"]."' required />";
			$form .= "</div>";
			$form .= "<div>";
				$form .= "<label for='editorial'>Editorial:</label>";
				$form .= listaMarcasEditada($fila["marca"]);
			$form .= "</div>";
			$form .= "<div>";
				$form .= "<input type='submit' id='actualizar-btn' name='actualizar_btn' value='Actualizar' />";
				$form .= "<input type='hidden' id='transaccion' name='transaccion' value='actualizar' />";
				$form .= "<input type='hidden' id='idBici' name='idBici' value='".$fila["id_bici"]."' />";
			$form .= "</div>";
		$form .= "</fieldset>";
		$form .= "</form>";

		$resultado->free();
	}
	else
	{
		$form = "<div class='error'>Error: No se ejecutó la consulta a la Base de Datos</div>";
	}

	$mysql->close();
	return printf($form);
}
?>