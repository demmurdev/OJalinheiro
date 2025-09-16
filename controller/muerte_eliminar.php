<?php

include_once("../model/baja_model.php");

$id_gallina=$_GET['id'];

eliminarBaja($id_gallina);

header("Location: ../index.php");