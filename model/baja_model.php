<?php

function insertarBaja($id_gallina, $fecha, $causa)
{
    include("../include/db_connection.php");

    $id_gallina = mysqli_real_escape_string($db, $id_gallina);
    $fecha = mysqli_real_escape_string($db, $fecha);
    $causa = mysqli_real_escape_string($db, $causa);

    $sql = "INSERT INTO baja (id_gallina, fecha, causa)
            VALUES ('$id_gallina', '$fecha', '$causa')";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error al insertar comercial: " . mysqli_error($db));
    }

    $nuevoId = mysqli_insert_id($db);

    mysqli_close($db);

    return $nuevoId;
}

function mostrarBajas()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT * FROM baja JOIN gallina ON baja.id_gallina=gallina.id";

    $result = mysqli_query($db, $sql);

    if (!$result) {
        exit("Error en la consulta: " . mysqli_error($db));
    }

    while ($fila = mysqli_fetch_assoc($result)) {
        $datos[] = $fila;
    }

    return $datos;
}


function eliminarBaja($id_gallina)
{
    include("../include/db_connection.php");

    $id_gallina = mysqli_real_escape_string($db, $id_gallina);
    
    $sql = "DELETE FROM baja WHERE id_gallina=$id_gallina";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error: " . mysqli_error($db));
    }
    
    mysqli_close($db);
}