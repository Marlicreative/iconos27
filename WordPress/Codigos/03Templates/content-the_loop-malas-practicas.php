<main class="item  main  w-70">
	<?php
	//Lógica de the_loop 
		//Si hay entradas
			//Mientras haya entradas
				//Muestra el contenido
		//Si no
			//NO hay entradas publicadas
	//Para busquedas personalizadas
	query_posts( 'order=ASC&category_name=gigantescos&posts_per_page=3' );
	
	if( have_posts() ) :
		while( have_posts() ) :
			the_post();
			//echo '<p>Imprimiendo entrada</p>';
	?>
		<article>
			<h1><?php the_title(); ?></h1>
			<a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
			<br />
			<p>
				<?php 
				//Devuelve la fecha, si hay varias entradas publicadas en una misma fecha, solo muestra la última
				the_date(); 
				the_time( 'd-M-Y' );
				?>
			</p>
			<p><?php the_excerpt(); ?></p>
			<p><?php the_category(); ?></p>
			<p><?php the_tags(); ?></p>
			<p><?php the_author(); ?></p>
			<div><?php the_content(); ?></div>
		</article>
		<hr/>
	<?php
		endwhile;
		rewind_posts();
	else :
		echo '<p class="error">No hay entradas</p>';
	endif;
	?>
</main>