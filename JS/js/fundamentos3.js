//http://es.wikipedia.org/wiki/Tres_en_l%C3%ADnea

//DECLARACIÓN DE OBJETOS Y VARIABLES
var turno = 1;
var queTurno;
var arregloGato = new Array(9);

//DECLARACIÓN DE FUNCIONES
function ganaJugador(letra)
{
	if(
		(arregloGato[1]==letra && arregloGato[2]==letra && arregloGato[3]==letra) ||
		(arregloGato[4]==letra && arregloGato[5]==letra && arregloGato[6]==letra) ||
		(arregloGato[7]==letra && arregloGato[8]==letra && arregloGato[9]==letra) ||
		(arregloGato[1]==letra && arregloGato[4]==letra && arregloGato[7]==letra) ||
		(arregloGato[2]==letra && arregloGato[5]==letra && arregloGato[8]==letra) ||
		(arregloGato[3]==letra && arregloGato[6]==letra && arregloGato[9]==letra) ||
		(arregloGato[1]==letra && arregloGato[5]==letra && arregloGato[9]==letra) ||
		(arregloGato[3]==letra && arregloGato[5]==letra && arregloGato[7]==letra)
	)
	{
		alert("Jugador "+letra+" GANA");
		window.location.reload();
	}
}

function gato(evento)
{
	//alert("gato");
	console.log(evento);
	//alert(evento.target.id);

	var id = evento.target.id;
	//alert(id);
	var celda = evento.target;
	celda.removeEventListener("click",gato);
	//alert(celda);
	//console.log(celda);
	var posicionAMarcar = id[1];
	//alert(posicionAMarcar);

	queTurno = turno%2;

	if(queTurno!=0 && arregloGato[posicionAMarcar]!=0)
	{
		celda.innerHTML = "X";
		celda.style.background = "#EC673A";
		arregloGato[posicionAMarcar] = "X";
		ganaJugador("X");
	}
	else if(queTurno==0 && arregloGato[posicionAMarcar]!=1)
	{
		celda.innerHTML = "O";
		celda.style.background = "#1C5F81";
		arregloGato[posicionAMarcar] = "O";
		ganaJugador("O");
	}

	if(turno==9)
	{
		alert("EMPATE");
		window.location.reload();
	}
	else
	{
		turno++;
	}
	console.log(turno);
}

function cargaDocumento()
{
	//alert("Documento cargado");
	var celdas = document.getElementsByClassName("gato");
	//console.log(celdas);

	//celdas.addEventListener("click",gato);
	//celdas[1].addEventListener("click",gato);

	var n=0;
	while(n < celdas.length)
	{
		celdas[n].addEventListener("click",gato);
		n++;
	}


}

//ASIGNACIÓN DE EVENTOS
window.addEventListener("load",cargaDocumento);