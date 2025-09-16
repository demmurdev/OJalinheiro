<?php
include_once("../model/gallina_model.php");

$nombre=$_POST['newcow'];
$fecha_nacimiento=$_POST['nacimiento'];
$fecha_alta=$_POST['alta'];
$nombre_raza=$_POST['nombre_raza'];

insertarGallina($nombre, $fecha_nacimiento, $fecha_alta, $nombre_raza);


// Redirigimos a la página principal
header("Location: ../index.php");