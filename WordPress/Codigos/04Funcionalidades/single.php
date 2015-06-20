<?php 
//include TEMPLATEPATH . '/index.php';
get_header();

$html = '
	<div class="container">
		<h1 class="item">single.php es el archivo que lee WordPress cuando accede a una entrada.</h1>
	</div>
';
printf( $html );

printf( '<main class="item  main  w-70">' );
	include TEMPLATEPATH . '/info-post.php';
	printf( '<section class="item  comments">' );
		comments_template();
	printf( '</section>' );
printf( '</main>' );

get_sidebar();
get_footer();