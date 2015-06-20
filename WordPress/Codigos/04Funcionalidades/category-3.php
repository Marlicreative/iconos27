<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$html = '
	<style>
		html { font-size: 48px !important; }
	</style>
	<div class="container">
		<h1 class="item">category.php es el archivo que toma por defecto WordPress para mostrar búsquedas de categorías.</h1>
		<h2 class="item">La Categoría que buscaste es: <mark>%s</mark></h2>
	</div>
';
printf( $html, single_cat_title( '', false ) );

include TEMPLATEPATH . '/content.php';
get_sidebar();
get_footer();