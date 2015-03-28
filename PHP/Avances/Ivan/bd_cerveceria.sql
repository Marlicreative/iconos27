CREATE DATABASE cerveceria;

USE cerveceria;

CREATE TABLE cervezas(
	id_cerveza INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	imagen VARCHAR(150) NOT NULL,
	alcohol VARCHAR(50) NOT NULL,
	color VARCHAR(50) NOT NULL,
	aroma VARCHAR(50) NOT NULL,
	cuerpo VARCHAR(50) NOT NULL,
	maridaje TEXT NOT NULL,
	estilo INT,
	PRIMARY KEY(id_cerveza)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE estilos(
	id_estilo INT NOT NULL AUTO_INCREMENT,
	estilo VARCHAR(50),
	PRIMARY KEY(id_estilo)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO estilos (id_estilo,estilo) VALUES
(1,"Lager Pilsen"),
(2,"Lager Especial"),
(3,"Lager Extra"),
(4,"Ale"),
(5,"American Pale Ale"),
(6,"Abadía"),
(7,"Negra Stout"),
(8,"Robust Porter"),
(9,"Lambric");