<?php
$host = "localhost:3306"; // Nombre del host (servidor de la base de datos)
$user = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
$database = "o_jalinheiro"; // Nombre de la Base de Datos

// Conectarse a la Base de Datos 
$db = mysqli_connect($host, $user, $password, $database);

// Verificar la conexión
if (mysqli_connect_errno()) {
    exit("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres
mysqli_set_charset($db, "utf8");

?>  