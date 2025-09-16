<?php

function insertarProduccion($id_gallina, $fecha_recogida, $cantidad)
{
    include("../include/db_connection.php");
    
        $id_gallina    = mysqli_real_escape_string($db, $id_gallina);
        $fecha_recogida = mysqli_real_escape_string($db, $fecha_recogida);
        $cantidad = mysqli_real_escape_string($db, $cantidad);
        
        $sql = "INSERT INTO produccion (id_gallina, fecha_recogida, cantidad)
            VALUES ('$id_gallina', '$fecha_recogida','$cantidad')";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error: " . mysqli_error($db));
    }

    $nuevoId = mysqli_insert_id($db);

    mysqli_close($db);

    return $nuevoId;
}

function eliminarProduccion($fecha)
{
    include("../include/db_connection.php");

    $fecha = mysqli_real_escape_string($db, $fecha);

    $sql = "DELETE FROM produccion WHERE fecha_recogida='$fecha'";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error: " . mysqli_error($db));
    }

    mysqli_close($db);
}

