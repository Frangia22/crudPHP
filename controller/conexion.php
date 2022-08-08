<?php
//Datos del servidor
$host = "localhost";
$username = "root";
$pass = "";
$database = "registromania";
//Creo la conexión con la base de datos
$con =  new mysqli($host, $username, $pass, $database);
//Chequeo la conexión
if ($con->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo "Conexión exitosa a $database, vamos amigo tu puedes!!!";

/*
Base de datos en el hosting
User: testingphp
BD: testingphp
Pass: 01oNyHqvkhB6
IP-->192.168.0.170
IP Pública-->190.228.29.68
*/
?>
