//por si algún archivo js anterior quedo mal cerrado
;

//Encapsulamos el componente dentro de una función anónima autoejecutable, con esto evitamos que si hay más librerias o códigos ajenos en el documento no creen conflicto con el plugin, ni con la utilización del '$'
(function($){
	/*
		Para la creacion de plugins con jQuery, hay dos objetos básicos que se extenderan:
			El objeto jQuery, que se encarga del procesamiento interno de la librería y 
			El objeto jQuery.fn que maneja la interaccion con elementos
		
		Si queremos crear una función general, usamos jQuery.extend()
		Si queremos hacer uso de los selectores, usamos jQuery.fn.extend()
	*/
	jQuery.fn.extend({
		//Nombre del componente
		plugin:function(opcionesUsuario)
		{
			opcionesIniciales = {
				fondo:"orangered",
				colorLetra:"black",
				letra:"32px"
			};

			/*
				Extensibilidad a las opciones por defecto del componente
				Si queremos dar la opción al usuario de modificar las opciones que por defecto tendrá el componente
			*/
			opc = $.fn.extend(
				opcionesIniciales,
				opcionesUsuario
			);

			function inicializar()
			{
				//alert("Funciona mi plugin");
				$(this).css({
					backgroundColor:opc.fondo,
					color:opc.colorLetra,
					fontSize:opc.letra
				});
			}

			return $(this).each(inicializar);
		}
	});
})(jQuery);