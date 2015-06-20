<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$html = '
	<div class="container">
		<h1 class="item">tag.php es el archivo que toma por defecto WordPress para mostrar búsquedas de etiquetas.</h1>
		<h2 class="item">La Etiqueta que buscaste es: <mark>%s</mark></h2>
	</div>
';
printf( $html, single_cat_title( '', false ) );

include TEMPLATEPATH . '/content.php';
get_sidebar();
get_footer();