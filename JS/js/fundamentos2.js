//DECLARACIÓN DE OBJETOS Y VARIABLES
var boton = document.getElementById("boton");
var boton2 = document.getElementById("boton2");
var numero = document.getElementById("numero");
var hola = document.getElementById("hola");
var bisiesto = document.getElementById("bisiesto");
var fecha = new Date();
var hora = fecha.getHours();
var dia = fecha.getDay();

var btnReloj = document.getElementById("reloj");
var detenerReloj = document.getElementById("detener-reloj");
var muestroHora = document.getElementById("muestro-hora");

var btnAlarma = document.getElementById("alarma");
var detenerAlarma = document.getElementById("detener-alarma");

//DECLARACIÓN DE FUNCIONES
function eventoClick(evento)
{
	//alert("Has presionado el botón");
	alert("Has presionado el botón en el evento "+evento.type+" con el objeto "+evento.target.id);
	console.log(evento);
	evento.target.style.borderRadius = "1em";
	evento.target.style.fontSize = "2em";

	boton2.removeEventListener("click",eventoClick);
	boton2.addEventListener("dblclick",otroEventoClick);
}

function otroEventoClick(evento)
{
	//alert("Has presionado el botón");
	alert("Has presionado el botón en el evento "+evento.type+" con el objeto "+evento.target.id);
	console.log(evento);
	evento.target.style.background = "black";
	evento.target.style.color = "white";
}

function parImpar()
{
	var numero = prompt("Ingresa un número");

	if(isNaN(numero))
	{
		//true
		alert("No me engañes, eso no es un número");
	}
	else
	{
		//false
		var modulo = numero%2;
		//var tipo = (modulo==0)?"Par":"Impar";
		var tipo = (modulo==1)?"Impar":"Par";
		alert("El número "+numero+" es "+tipo);
	}
}

function saluda()
{
	//alert(fecha);
	//alert(hora);
	/*Algoritmo para saludar:
		1)El Día tiene 24 horas que van de la 0 a la 23
		2)Decimos Deja dormir de las 0 a las 5
		3)Decimos Buenos días de las 6 a las 11
		4)Decimos Buenos tardes de las 12 a las 18
		5)Decimos Buenos noches de las 19 a las 23
	*/
	var hojaCSS = document.createElement("link");
	hojaCSS.rel = "stylesheet";

	//if(hora < 6)
	if(hora <= 5)
	{
		alert("Deja dormir!!!");
		hojaCSS.href = "activos/duermete.css";
	}
	//else if(hora > 5 && hora < 12)
	else if(hora >= 6 && hora <= 11)
	{
		alert("Buenos Días");
		hojaCSS.href = "activos/dia.css";
	}
	//else if(hora > 11 && hora < 19)
	else if(hora >= 12 && hora <= 18)
	{
		alert("Buenos Tardes");
		hojaCSS.href = "activos/tarde.css";
	}
	else
	{
		alert("Buenos Noches");
		hojaCSS.href = "activos/noche.css";
	}

	document.head.appendChild(hojaCSS);

	//alert(dia);
	/* 
	DLMMiJVS
	0123 456
	*/
	switch(dia)
	{
		case 0:
			alert("Es Domingo vamonos a la bici");
			break;
		case 5:
			alert("Por fin es Viernes!!!!");
			break;
		case 6:
			alert("Es Sábado");
			break;
		default:
			alert("Estoy a la espera del fin de semana");
			break;
	}
}

function anioBisiesto()
{
	//alert("Tarea: Determinen si el año que el usuario ingresa es bisiesto o no");
	var anio = prompt("Ingresa un año");

	if(isNaN(anio))
	{
		alert("No me engañes, eso no es un año");
	}
	else
	{
		if((anio%4 == 0 && anio%100 != 0) || anio%400 == 0)
		{
			alert("El año "+anio+" es bisiesto");
		}
		else
		{
			alert("El año "+anio+" NO es bisiesto");
		}
	}
}

function reloj()
{
	//muestroHora.innerHTML = Date();
	var fechaReloj = new Date();
	var hrReloj = fechaReloj.getHours();
	var minReloj = fechaReloj.getMinutes();
	var segReloj = fechaReloj.getSeconds();

	if(hrReloj<=9)
	{
		hrReloj = "0" + hrReloj;
	}

	if(minReloj<=9)
	{
		minReloj = "0" + minReloj;
	}

	if(segReloj<=9)
	{
		segReloj = "0" + segReloj;
	}

	muestroHora.innerHTML = "<p>"+hrReloj+":"+minReloj+":"+segReloj+" hrs.</p>"; 
}

function alarma()
{
	var audio = document.createElement("audio");
	audio.src = "activos/alarma.mp3";
	return audio.play();
}

//ASIGNACIÓN DE EVENTOS
//Los manejadores de eventos semánticos se ejecutan a la carga del documento
window.onload = function(){
	boton.onclick = eventoClick;
	boton.onclick = otroEventoClick;

	boton2.addEventListener("click",eventoClick);
	numero.addEventListener("click",parImpar);

	hola.addEventListener("click",saluda);
	bisiesto.addEventListener("click",anioBisiesto);

	btnReloj.addEventListener("click",function(){
		iniciarReloj = setInterval(reloj,1000);
	});

	detenerReloj.addEventListener("click",function(){
		clearInterval(iniciarReloj);
	});

	btnAlarma.addEventListener("click",function()
	{
		iniciarAlarma = setTimeout(alarma,3000);
	});

	detenerAlarma.addEventListener("click",function()
	{
		clearTimeout(iniciarAlarma);
	});
}