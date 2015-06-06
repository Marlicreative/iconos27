<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>
<body>
	<h1>Hola WordPress</h1>
	<h2><code>bloginfo()</code></h2>
	<p>Nombre: <mark><?php bloginfo('name'); ?></mark></p>
	<p>Descripción: <mark><?php bloginfo('description'); ?></mark></p>
	<p>URL archivo CSS: <mark><?php bloginfo('stylesheet_url'); ?></mark></p>
	<p>URL del home: <mark><?php bloginfo('home'); ?></mark></p>
	<p>URL del template: <mark><?php bloginfo('template_url'); ?></mark></p>
	<img src="<?php bloginfo('template_url'); ?>/screenshot.png" />
</body>
</html>