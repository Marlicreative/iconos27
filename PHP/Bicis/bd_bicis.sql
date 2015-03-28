CREATE DATABASE bicis;

USE bicis;

CREATE TABLE bici(
	id_bici INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	marca INT,
	PRIMARY KEY(id_bici)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE marcas(
	id_marca INT NOT NULL AUTO_INCREMENT,
	marca VARCHAR(50),
	PRIMARY KEY(id_marca)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO marcas (id_marca,marca) VALUES
	(1,"Dahon"),
	(2,"Tern"),
	(3,"Haro"),
	(4,"Brompton"),
	(5,"Benotto"),
	(6,"Apache");