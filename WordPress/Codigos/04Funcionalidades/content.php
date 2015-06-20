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
		//printf( '<p>Imprimiendo entrada</p>' );
		include TEMPLATEPATH . '/info-post.php';
	endwhile;
	rewind_posts();
else :
	printf( '<p class="error">No hay entradas</p>' );
endif;
printf( '</main>' );