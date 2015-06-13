<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$html = '
	<div class="container">
		<h1 class="item">404.php es el archivo que lee WordPress cuando accede a un ruta que no existe.</h1>
		<h2 class="error">Error 404 NO ENCONTRADO</h2>
	</div>
';
printf( $html );

get_footer();