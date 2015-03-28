/*
Nombre de la BD Ceiidd


nombre tabla - autores
id - PK - int - AI - Not Null
Nombre - varchar(50 caracteres)
*/

CREATE DATABASE Ceiidd;

USE Ceiidd;

CREATE TABLE autores(
	id_autor INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	creado DATETIME NOT NULL,
  	actualizado DATETIME NOT NULL,
	PRIMARY KEY(id_autor)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO autores (id_autor,nombre,creado,actualizado) VALUES
(1,"Lipovetsky Gilles",NOW(),NOW()),
(2,"Serroy Jean",NOW(),NOW()),
(3,"Gruzinski Serge",NOW(),NOW());



/*
nombre tabla - generos
id - PK - int - AI - Not Null
Genero - varchar(50 caracteres)
*/
CREATE TABLE tipos(
	id_tipo INT NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(50) NOT NULL,
	PRIMARY KEY(id_tipo)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tipos (id_tipo,tipo) VALUES
(1,"Manual"),
(2,"Ponencia"),
(3,"Artículo"),
(4,"Libro");


CREATE TABLE publicaciones(
	id_publicacion INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	imagen VARCHAR(150) NOT NULL,
	año YEAR,
	tipo INT NOT NULL,
	creado DATETIME NOT NULL,
  	actualizado DATETIME NOT NULL,
	PRIMARY KEY(id_publicacion)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO publicaciones (id_publicacion,nombre,imagen,año,tipo,creado,actualizado) VALUES
(1,"LA PANTALLA GLOBAL","http://www.hechosdehoy.com/imagenes/fotosdeldia/2040_portada_del_libro___foto__hh___aj_.jpg",2007,4,NOW(),NOW()),
(2,"LA GUERRA DE LAS IMÁGENES","http://www.hechosdehoy.com/imagenes/fotosdeldia/2040_portada_del_libro___foto__hh___aj_.jpg",1990,4,NOW(),NOW());


CREATE TABLE autores_publicaciones(
	id_autor INT NOT NULL,
	id_publicacion INT NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO autores_publicaciones (id_autor,id_publicacion) VALUES
(1,1),
(2,1),
(3,2);




