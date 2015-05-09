var calendario = {
	test:Modernizr.inputtypes.date,
	//both:"js/jquery.min.js",
	//yep:"",
	nope:[
		"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css",
		"//code.jquery.com/ui/1.11.4/jquery-ui.js"
	],
	complete:function (){
		if(!Modernizr.inputtypes.date)
		{
			//alert("Tu navegador No soporta el input date de HTML5");
			$("#cumple").datepicker({
				dateFormat:"dd/mm/yy"
			});
		}
		else
		{
			//alert("Tu navegador Si soporta el input date de HTML5");
		}
	}	
};

function enviarDatos(evento)
{
	evento.preventDefault();

	var opcionesDeEnvio = {
		url:"php/servidor.php",
		type:"POST",//POST o GET
		dataType:"text",//json,xml,html,text,script
		data:$(this).serialize(),
		beforeSend:function (){
			//alert("Antes de enviar");
			$("#precarga").fadeIn("slow");
		},
		error:function (){
			//alert("Error");
			$("#precarga").fadeOut("slow",function (){
				$("#mensaje")
					.fadeIn("slow")
					.html("Ocurrió un error con el Servidor");
			});
		},
		success:function (respuestaServidor){
			//alert("Éxito: "+respuestaServidor);
			$("#precarga").fadeOut("slow",function (){
				$("#mensaje")
					.fadeIn("slow")
					.html(respuestaServidor);
			});
		}
	};

	//console.log($(this).serialize());

	$.ajax(opcionesDeEnvio);
}