CREATE DATABASE superheroes27;

USE superheroes27;

CREATE TABLE heroes(
	id_heroe INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	imagen VARCHAR(150) NOT NULL,
	descripcion TEXT NULL,
	editorial INT,
	PRIMARY KEY(id_heroe)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE editoriales(
	id_editorial INT NOT NULL AUTO_INCREMENT,
	editorial VARCHAR(50),
	PRIMARY KEY(id_editorial)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO editoriales (id_editorial,editorial) VALUES
	(1,"DC Comics"),
	(2,"Marvel Comics"),
	(3,"Shonen Jump"),
	(4,"Vértigo"),
	(5,"Mirage Studio"),
	(6,"Icon Comics");