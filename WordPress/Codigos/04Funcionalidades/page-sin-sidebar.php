<?php
/*
Template name: Página sin sidebar
*/
//include TEMPLATEPATH . '/index.php';
get_header();

$html = '
	<div class="container">
		<h1 class="item">page.php es el archivo que lee WordPress cuando accede a una página estática.</h1>
	</div>
';
printf( $html );

printf( '<main class="item  main">' );
	include TEMPLATEPATH . '/info-post.php';
printf( '</main>' );

get_sidebar();
get_footer();