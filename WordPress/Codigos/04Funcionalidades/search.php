<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$html = '
	<div class="container">
		<h1 class="item">search.php es el archivo que toma por defecto WordPress para mostrar los resultados de una búsqueda.</h1>
		<h2 class="item">Los resultados para la búsqueda <mark>%s</mark> son:</h2>
	</div>
';
printf( $html, get_search_query() );

include TEMPLATEPATH . '/content.php';
get_sidebar();
get_footer();