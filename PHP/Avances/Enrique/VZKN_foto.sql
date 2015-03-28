CREATE DATABASE FotosVZKN;

Use FotosVZKN;

CREATE TABLE Trabajo(
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	URL VARCHAR(150) NOT NULL,
	descripcion TEXT NULL,
	tipo INT NOT NULL,
	tipo2 INT NOT NULL,
	PRIMARY KEY(id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO Trabajo (id, tipo) VALUES
	(1, "Truco Rápido"),
	(2, "PROFile"),
	(3, "5 Trucos"),
	(4, "Leyenda"),
	(5, "Eventos");

INSERT INTO Trabajo (id, tipo2) VALUES
	(6, "Nombre"),
	(7, "Truco"),
	(8, "Patinador"),
	(9, "Marca"),
	(10, "Evento");
