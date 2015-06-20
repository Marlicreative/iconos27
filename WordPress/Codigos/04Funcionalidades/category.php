<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$defaults = array(
	'theme_location' => 'menu_razas',
	'container' => 'nav',
	'container_class' => 'item nav nav-main',
	'container_id' => 'nav-razas'
);

wp_nav_menu( $defaults );

$html = '
	<div class="container">
		<h1 class="item">category.php es el archivo que toma por defecto WordPress para mostrar búsquedas de categorías.</h1>
		<h2 class="item">La Categoría que buscaste es: <mark>%s</mark></h2>
	</div>
';
printf( $html, single_cat_title( '', false ) );

include TEMPLATEPATH . '/content.php';
get_sidebar();
get_footer();