function efectos()
{
	$("#jqy").on("click",function(evento){
		evento.preventDefault();
		$("#contenido").load("html/jquery.html");
	});
}