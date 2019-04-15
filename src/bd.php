<?php

/* Conectar a una base de datos de MySQL invocando al controlador */
$dsn = 'mysql:dbname=proyecto;host=bd';
$user = 'proyecto';
$pass = 'dbpass';

try {
	$gbd = new PDO($dsn, $user, $pass);
	echo "Conectado a $dsn";
} catch (PDOException $e) {
	echo 'Falló la conexión: ' . $e->getMessage();
	echo "$dsn, $user, $pass";
}

?>
