<?php
include_once("../model/raza_model.php");

$nombre=$_POST['raza'];
$descripcion=$_POST['des_raza'];

insertarRaza($nombre, $descripcion);


// Redirigimos a la página principal
header("Location: ../index.php");