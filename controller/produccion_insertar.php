<?php
var_dump($_POST);

include_once("../model/produccion_model.php");

$gallinas=$_POST['gallinas'];
$fecha_recogida=$_POST['fecha'];


eliminarProduccion($fecha_recogida);

foreach($gallinas as $gallina){

    $id_gallina=$gallina;    
    $cantidad=$_POST[$gallina];
    
    insertarProduccion($id_gallina, $fecha_recogida, $cantidad);
}


header("Location: ../index.php");