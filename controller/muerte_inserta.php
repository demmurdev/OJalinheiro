<?php
include_once("../model/baja_model.php");

$id_gallina=$_POST['nombreb'];
$fecha=$_POST['baja'];
$causa=$_POST['motivo'];

insertarBaja($id_gallina, $fecha, $causa);


// Redirigimos a la página principal
header("Location: ../index.php");