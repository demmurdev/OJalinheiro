<?php

include_once("../model/raza_model.php");

$nombre=$_GET['nombre'];

eliminarRaza($nombre);

header("Location: ../index.php");