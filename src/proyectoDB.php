<?php
$cons="
CREATE TABLE usuario(
	email VARCHAR(255)PRIMARY KEY,
	nombre VARCHAR(55)NOT NULL,
	apellido VARCHAR(55)NOT NULL,
	ciudad INT(2),
    foto VARCHAR(255) NOT NULL,
	passwd VARCHAR (255)NOT NULL
);
CREATE TABLE profesional(
	email VARCHAR (255) PRIMARY KEY,
    fecha_nac DATE NOT NULL,
    publicados INT(4)NOT NULL
);


CREATE TABLE cliente(
	email VARCHAR(255)PRIMARY KEY,
    fecha_reg DATE NOT NULL
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
CREATE TABLE comenta(
	email_user VARCHAR(255)NOT NULL,
	id_anuncio INT NOT NULL,
	fecha DATE NOT NULL,
	texto VARCHAR(255) NOT NULL,
    PRIMARY KEY(email_user,id_anuncio,fecha)
);
CREATE TABLE puntua(
	email_user VARCHAR(255)NOT NULL,
	id_anuncio INT(10) NOT NULL,
	puntos INT(2) NOT NULL,
    PRIMARY KEY (email_user,id_anuncio)
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
	fecha_pub DATE,
    puntos INT (5),
    votados INT(5)
);

ALTER TABLE usuario ADD FOREIGN KEY(ciudad) REFERENCES ciudad(id);
ALTER TABLE profesional ADD FOREIGN KEY (email) REFERENCES usuario (email);
ALTER TABLE cliente ADD FOREIGN KEY (email) REFERENCES usuario (email);

ALTER TABLE comenta ADD FOREIGN KEY (email_user) REFERENCES cliente(email);
ALTER TABLE comenta ADD FOREIGN KEY (id_anuncio) REFERENCES anuncio(id);
ALTER TABLE puntua ADD FOREIGN KEY (email_user) REFERENCES cliente(email);
ALTER TABLE puntua ADD FOREIGN KEY (id_anuncio) REFERENCES anuncio(id);
ALTER TABLE anuncio ADD FOREIGN KEY (email_user) REFERENCES profesional(email);
ALTER TABLE anuncio ADD FOREIGN KEY (id_cat) REFERENCES categoria(id);

DELIMITER //
CREATE TRIGGER anuncio_after_insert
AFTER INSERT
   ON anuncio FOR EACH ROW
BEGIN
   UPDATE profesional 
   SET publicados=publicados+1
   where email=NEW.email_user;
END; //

DELIMITER //
CREATE TRIGGER puntua_after_insert
AFTER INSERT
   ON puntua FOR EACH ROW
BEGIN
   UPDATE anuncio 
   SET puntos=puntos+NEW.puntos,
   votados=votados+1
   where id=NEW.id_anuncio;
END; //

DELIMITER //
CREATE PROCEDURE insert_prof(IN email VARCHAR (255),IN nombre VARCHAR(55),IN apellido VARCHAR(55),IN ciudad INT(2),
 foto VARCHAR(255),passwd VARCHAR(255),IN fecha_nac DATE,IN publicados INT(4))
BEGIN
INSERT INTO usuario VALUES(email,nombre,apellido,ciudad,foto,passwd);
INSERT INTO profesional VALUES(email,fecha_nac,publicados);
END//

DELIMITER //
CREATE PROCEDURE insert_cliente(IN email VARCHAR (255),IN nombre VARCHAR(55),IN apellido VARCHAR(55),IN ciudad INT(2),
 foto VARCHAR(255),passwd VARCHAR(255),IN fecha_reg DATE)
BEGIN
INSERT INTO usuario VALUES(email,nombre,apellido,ciudad,foto,passwd);
INSERT INTO cliente VALUES(email,fecha_reg);
END//


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


";

?>