;

(function($){
	jQuery.fn.extend({
		onePage:function(opcUsr)
		{
			opcIniciales = {
				velocidad:"slow"
			};

			opc = $.fn.extend(opcIniciales,opcUsr);

			function inicializar()
			{
				//alert("funciona");
				function aDondeVoy()
				{
					//alert("aDondeVoy");
					var idEnlace = $(this).attr("href");
					//offset() me da las coordenadas top,left de mi elemento
					var posicionElemento = $(idEnlace).offset().top;
					//console.log(idEnlace,posicionElemento);

					$("body,html").animate({
						scrollTop:posicionElemento
					},opc.velocidad);

					return false;
				}

				$(this).on("click",aDondeVoy);
			}

			return $(this).each(inicializar);
		}
	});
})(jQuery);