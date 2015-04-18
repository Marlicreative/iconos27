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

	$("#boton12").on("click",function(){
		//$("#oculto").hide(2000);
		//alert("El párrafo se ha ocultado");

		//callback
		$("#oculto").hide(2000,function(){
			alert("El párrafo se ha ocultado");
		});
	});

		/*
	antes .before()
	<selector>
		antes .prepend()
		CONTENIDO .html()
		después .append()
	</selector>
	después .after()
	*/

	$("#boton13").on("click",function(){
		$("p").html("<i>El contenido ha sido cambiado</i><input type='text'/>");
	});

	$("#boton14").on("click",function(){
		$("p").prepend("<b>contenido agregado antes</b> <img src='http://cursos.bextlan.com/img/jquery.png' /> ");
	});
	
	$("#boton15").on("click",function(){
		$("p").append(" <b>contenido agregado después</b> <img src='http://cursos.bextlan.com/img/jquery.png' /> <iframe width='560' height='315' src='https://www.youtube.com/embed/AoZYaUXmGB8' frameborder='0' allowfullscreen></iframe>");
	});
	
	$("#boton16").on("click",function(){
		$("p").before("<div class='antes'><i>contenido agregado antes del selector</i></div>");
		$(".antes").css("background","magenta");
	});
	
	$("#boton17").on("click",function(){
		$("p").after("<div class='despues'><i>contenido agregado después del selector</i></div>");
		$(".despues").css("background","cyan");
	});
	
	$("#boton18").on("click",function(){
		$("p").css("font-size","2em");
		$("p").css({backgroundColor:"skyblue"});
	});
	
	$("#boton19").on("click",function(){
		$("p").css({
			"background-color":"#EEE",
			border:"thick solid #EC673A",
			borderRadius:"1em",
			fontSize:"2em",
			padding:"1em",
			"text-shadow":"5px 5px 10px #000"
		});
	});

	/*
	$("#enlace").on("click",function(){});
	$("#enlace").on("mouseover",function(){});
	$("#enlace").on("mouseout",function(){});
	*/

	$("#enlace").on({
		click:function(evento){
			evento.preventDefault();
			alert("Se ha prevenido el enlace");
		},
		mouseover:function(){
			$("span").addClass("span-css");
		},
		mouseout:function(){
			$("span").removeClass("span-css")
		}
	});

	$("#boton20").on("click",function(){
		//$("#ajax").load("otro.html");
		$("#ajax").load("otro.html #logo");
	});

	$("#boton21").on("click",function(){
		$("#ajax").load("otro.html",function(){
			$(this)
				.css({display:"none"})
				.fadeIn(2000);
		});
	});

	$("#que-tecla").on("keyup",function(evento){
		$("#codigo-tecla").text(evento.keyCode);
	});

	$("#subir").on("click",function(){
		$("body,html").animate({
			scrollTop:0,
			scrollLeft:0
		},0);
	});
}

function muevete(evento)
{
	//alert(evento.keyCode);
	switch(evento.keyCode)
	{
		case 37:
			evento.preventDefault();
			$("#pacman").animate({left:"-=2em"},"swing");
			break;
		case 38:
			evento.preventDefault();
			$("#pacman").animate({top:"-=2em"},"swing");
			break;
		case 39:
			evento.preventDefault();
			$("#pacman").animate({left:"+=2em"},"swing");
			break;
		case 40:
			evento.preventDefault();
			$("#pacman").animate({top:"+=2em"},"swing");
			break;		
	}
}

function detectarScroll()
{
	var scrollVertical = $(window).scrollTop();
	var scrollHorizontal = $(window).scrollLeft();

	console.log(scrollVertical,scrollHorizontal);

	/*
	if(scrollVertical>100)
	{
		$("#subir").fadeIn();
	}
	else
	{
		$("#subir").fadeOut();
	}
	*/

	return (scrollVertical>100)?$("#subir").fadeIn():$("#subir").fadeOut();
}

function responsiveDesign()
{
	var anchoPantalla = $(window).width();
	var altoPantalla = $(window).height();
	console.log(anchoPantalla,altoPantalla);

	var limite = (anchoPantalla<800)?true:false;
	
	if(limite)
	{
		//una columna
		$(".hijos").removeClass("dos-columnas");
	}
	else
	{
		//dos columnas
		$(".hijos").addClass("dos-columnas");
	}
}

//manejador de eventos múltiples
//$(objeto).on("evento",función);
$(document).on("keydown",muevete);
$(document).on("ready",efectos);
//$(window).on("load",efectos);
$(window).on("scroll",detectarScroll);
$(window).on("resize load",responsiveDesign)
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

}
*/
