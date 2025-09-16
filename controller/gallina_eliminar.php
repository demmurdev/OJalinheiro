<?php

include_once("../model/gallina_model.php");

$id=$_GET['id'];

eliminarGallina($id);

header("Location: ../index.php");