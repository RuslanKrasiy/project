<?php
$cons="
CREATE TABLE user(
	email VARCHAR(255)PRIMARY KEY,
	nombre VARCHAR(55)NOT NULL,
	apellido VARCHAR(55)NOT NULL,
	fecha_nac DATE NOT NULL,
	fecha_reg DATE NOT NULL,
	ciudad INT(2),
	passwd VARCHAR (255)NOT NULL,
	foto VARCHAR(255),
	publicacion INT(1)NOT NULL
);
CREATE TABLE ciudad(
	id INT(2)PRIMARY KEY,
	nombre VARCHAR(55)NOT NULL,
	postal INT(5)NOT NULL
);
CREATE TABLE categoria(
	id INT(2)PRIMARY KEY,
	nombre VARCHAR(55)NOT NULL
);
CREATE TABLE comentario(
	email VARCHAR(255)NOT NULL,
	id_anuncio INT NOT NULL,
	fecha DATE NOT NULL,
	texto VARCHAR(255) NOT NULL,
    PRIMARY KEY(email,id_anuncio,fecha)
);
CREATE TABLE puntos(
	email VARCHAR(255)NOT NULL,
	id_anuncio INT NOT NULL,
	puntos INT(2) NOT NULL,
    PRIMARY KEY (email,id_anuncio)
);
CREATE TABLE anuncio(
	id INT(10)PRIMARY KEY,
	email_user VARCHAR(255)NOT NULL,
	id_cat INT(2)NOT NULL,	
	titulo VARCHAR(255)NOT NULL,	
	subtitulo VARCHAR(255)NOT NULL,
	descripcion VARCHAR(255)NOT NULL,
	contacto VARCHAR(255)NOT NULL,
	fotos VARCHAR(255)NOT NULL,
	fecha_pub DATE
);
ALTER TABLE user ADD FOREIGN KEY(ciudad) REFERENCES ciudad(id);
ALTER TABLE comentario ADD FOREIGN KEY (email) REFERENCES user(email);
ALTER TABLE comentario ADD FOREIGN KEY (id_anuncio) REFERENCES anuncio(id);
ALTER TABLE puntos ADD FOREIGN KEY (email) REFERENCES user(email);
ALTER TABLE puntos ADD FOREIGN KEY (id_anuncio) REFERENCES anuncio(id);
ALTER TABLE anuncio ADD FOREIGN KEY (email_user) REFERENCES user(email);
ALTER TABLE anuncio ADD FOREIGN KEY (id_cat) REFERENCES categoria(id);
INSERT INTO categoria VALUES('1','peluqeria'),('2','cosmetica'),('3','estetica');
INSERT INTO ciudad VALUES
('01','Alava','01000'),('02','Albacete','02000'),('03','Alicante','03000'),
('04','Almería','04000'),('05','Ávila','05000'),('06','Badajoz','06000'),
('07','Baleares','07000'),('08','Barcelona','08000'),('09','Burgos','09000'),
('10','Cáceres','10000'),('11','Cádiz','11000'),('12','Castellón','12000'),
('13','ciudad Real','13000'),('14','Córdoba','14000'),('15','Coruña','15000'),
('16','Cuenca','16000'),('17','Gerona','17000'),('18','Granada','18000'),('19','Guadalajara','19000'),
('20','Guipúzcoa','20000'),('21','Huelva','21000'),('22','Huesca','22000'),
('23','Jaén','23000'),('24','León','24000'),('25','Lérida','25000'),('26','La Rioja','26000'),
('27','Lugo','27000'),('28','Madrid','28000'),('29','Málaga','29000'),('30','Murcia','30000'),
('31','Navarra','31000'),('32','Orense','32000'),('33','Asturias','33000'),
('34','Palencia','34000'),('35','Las Palmas','35000'),('36','Pontevedra','36000'),
('37','Salamanca','37000'),('38','Santa Cruz de Tenerife','38000'),
('39','Cantabria (Santander)','39000'),('40','Segovia','40000'),
('41','Sevilla','41000'),('42','Soria','42000'),('43','Tarragona','43000'),
('44','Teruel','44000'),('45','Toledo','45000'),('46','Valencia','46000'),
('47','Valladolid','47000'),('48','Vizcaya (Bilbao)','48000'),('49','Zamora','49000'),
('50','Zaragoza','50000'),('51','Ceuta','51000'),('52','Melilla','52000');
DELIMITER //
CREATE TRIGGER anuncio_after_insert
AFTER INSERT
   ON anuncio FOR EACH ROW
BEGIN
   UPDATE user 
   SET publicacion=publicacion-1
   where email_user=email;
END; //";

?>