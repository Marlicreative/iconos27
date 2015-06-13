<?php
printf( '<main class="item  main  w-70">' );
//Lógica de the_loop 
	//Si hay entradas
		//Mientras haya entradas
			//Muestra el contenido
	//Si no
		//NO hay entradas publicadas
//Para busquedas personalizadas
//query_posts( 'order=ASC&category_name=gigantescos&posts_per_page=3' );
if( have_posts() ) :
	while( have_posts() ) :
		the_post();
		//printf( '<p>Imprimiendo entrada</p>' );
		$html = '
			<article>
				<h1>%s</h1>
				<a href="%s">%s</a>
				<br />
				<p>%s - %s</p>
				<p>%s</p>
				<p>%s</p>
				<p>%s</p>
				<p>%s</p>
				<div>%s</div>
			</article>
			<hr />
		';

		printf( 
			$html,
			get_the_title(),
			get_the_permalink(),
			get_the_permalink(), 
			get_the_date(),
			get_the_time('d-M-Y'),
			get_the_excerpt(),
			//get_the_category(),
			get_the_category_list(' - '),
			//get_the_tags(),
			get_the_tag_list('',', ',''),
			get_the_author(),
			get_the_content()
		);
	endwhile;
	rewind_posts();
else :
	printf( '<p class="error">No hay entradas</p>' );
endif;
printf( '</main>' );