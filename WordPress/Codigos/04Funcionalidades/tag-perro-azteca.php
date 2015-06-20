<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$css = "background: #26bf3f; /* Old browsers */
background: -moz-linear-gradient(-45deg, #26bf3f 0%, #ffffff 32%, #ffffff 59%, #ff0000 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#26bf3f), color-stop(32%,#ffffff), color-stop(59%,#ffffff), color-stop(100%,#ff0000)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(-45deg, #26bf3f 0%,#ffffff 32%,#ffffff 59%,#ff0000 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(-45deg, #26bf3f 0%,#ffffff 32%,#ffffff 59%,#ff0000 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(-45deg, #26bf3f 0%,#ffffff 32%,#ffffff 59%,#ff0000 100%); /* IE10+ */
background: linear-gradient(135deg, #26bf3f 0%,#ffffff 32%,#ffffff 59%,#ff0000 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#26bf3f', endColorstr='#ff0000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */";

$html = '
	<style>
		.container { %s }
	</style>
	<div class="container">
		<h1 class="item">tag.php es el archivo que toma por defecto WordPress para mostrar búsquedas de etiquetas.</h1>
		<h2 class="item">La Etiqueta que buscaste es: <mark>%s</mark></h2>
	</div>
';
printf( $html, $css, 	tle( '', false ) );

include TEMPLATEPATH . '/content.php';
get_sidebar();
get_footer();