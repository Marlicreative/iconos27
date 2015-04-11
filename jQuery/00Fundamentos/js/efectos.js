/*
Sintaxis básica de jQuery
$("selector") o jQuery("Selector")

$(objeto).evento(parámetros);
$(objeto).metodo(parámetros);
$(objeto).atributo = valor;

*/
function efectos()
{
	//alert("Mamá ya se usar jQuery");
	$("p").on("click",function(){
		$(this).hide();
	});

	$("#boton").on("click",function(){
		$("p").show();
	});

	$("#boton2").on("click",function(){
		$("p").hide(3000);
	});

	$("#boton3").on("click",function(){
		$("p").show("swing"); /*slow,fast,swing*/
	});

	$("p").css("background-color","pink");

	$("p").css({backgroundColor:"pink"});

	$("p").css({
		"background-color":"yellow",
		fontSize:"24px",
		color:"green"
	});

	$("#boton4").on("click",function(){
		$("p").toggle();
	});

	$("#boton5").on("click",function(){
		$("p").toggle("slow");
	});

	$(".mostrar").on("click",function(){
		$(".deslizante").slideDown();
	});

	$(".ocultar").on("click", function(){
		$(".deslizante").slideUp(4000);
	});

	$(".mostrar-ocultar").on("click",function(){
		$(".deslizante").slideToggle("swing");
	});

	$("#boton6").on("click",function(){
		$("#cuadro").fadeTo("fast",.25);
	});

	$("#boton7").on("click",function(){
		$("#cuadro").fadeTo(3000,1);
	});

	$("#boton8").on("click",function(){
		$("#cuadro").fadeOut(4000);
	});

	$("#boton9").on("click",function(){
		$("#cuadro").fadeIn(4000);
	});

	$("#parpadea").on("click",function(){
		parpadea = setInterval(function(){
			$("#cuadro").fadeOut().fadeIn();
		},1000);
	});

	$("#desparpadea").on("click",function(){
		clearInterval(parpadea);
	});

	$("#boton10").on("click",function(){
		$("#animable")
			.animate({height:300},"slow")
			.animate({width:300},1500)
			.animate({height:100,width:100},3000);
	});

	$("#boton11").on("click",function(){
		$("#animable")
			.animate({left:"50%"},"swing")
			.animate({width:"300px"},1500)
			.animate({"font-size":"3em"},2000)
			.animate({fontSize:"2em"},2500)
			//http://plugins.jquery.com/color/
			.animate({backgroundColor:"#1C5F81"},"fast")
			.animate({color:"white"},"fast")
			.animate({top:-100},"slow")
			.animate({
				"font-size":"1em",
				left:0,
				top:0,
				width:100
			},5000);
	});	

}

//manejador de eventos múltiples
//$(objeto).on("evento",función);
$(document).on("ready",efectos);
//$(window).on("load",efectos);

/*
//semantica
$(window).load(efectos);

$(window).on("load",function(){

});

function alCargarDocumento()
{

}

window.onload = alCargarDocumento;
window.addEventListener("load",alCargarDocumento);

window.onload = function(){

}*/