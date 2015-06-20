<?php 
the_post();
$html = '
	<article>
		%s
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
	get_the_post_thumbnail($post_id,'medium'),
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

//the_post_thumbnail(); //thumbnail, medium, large o full