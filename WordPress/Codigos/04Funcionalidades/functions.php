<?php 
//El archivo functions.php  es como una biblioteca personal de funciones, es una manera fácil de agregar o modificar el comportamiento por defecto de WordPress. Se comporta exactamente igual que un plugin, añadiendo características y funcionalidad a un tema, y se puede utilizar tanto para definir nuevas funciones PHP como para modificar las que ya incorpora WordPress.

//Generar menús
$locations = array(
	'menu_principal' => 'Menú Principal',
	'menu_razas' => 'Menú Razas',
	'menu_social' => 'Menú Social Media'
);

register_nav_menus( $locations );

//modificar los [...] del excerpt
function read_more()
{
	return ' <a href="' . get_permalink() . '"><small>leer más...</small></a>';
}

//Hooks de WP
add_filter('excerpt_more', 'read_more');
//add_action()

//Imagen destacada
add_theme_support('post-thumbnails');

//Widgets
function activate_widgets()
{
	$args1 = array(
		'name' => 'Widget 1',
		'description' => 'Este es mi primer widget',
		'id' => 'widget1',
		'class' => 'widgets',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);

	register_sidebar($args1);
	
	$args2 = array(
		'name' => 'Widget 2',
		'description' => 'Este es mi segundo widget',
		'id' => 'widget2',
		'class' => 'widgets',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);
	
	register_sidebar($args2);
}
add_action('widgets_init','activate_widgets');