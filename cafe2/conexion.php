<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe2"; //NOMBRE DE LA BASE DE DATOS//

$conn = new mysqli($servername, $username, $password, $dbname); //CREACIÓN DE LA CONEXIÓN//

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); //VERIFICAR LA CONEXIÓN//
}

$conn->set_charset("utf8"); //CARACTERES UTF-8 (PARA ACENTOS)//
?>