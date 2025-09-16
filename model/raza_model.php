<?php

function insertarRaza($nombre, $descripcion)
{
    include("../include/db_connection.php");

    $nombre    = mysqli_real_escape_string($db, $nombre);
    $descripcion = mysqli_real_escape_string($db, $descripcion);

    $sql = "INSERT INTO raza (nombre, descripcion)
            VALUES ('$nombre', '$descripcion')";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error al insertar comercial: " . mysqli_error($db));
    }

    $nuevoId = mysqli_insert_id($db);

    mysqli_close($db);

    return $nuevoId;
}

function mostrarRazas()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT * FROM raza";

    $result = mysqli_query($db, $sql);

    if (!$result) {
        exit("Error en la consulta: " . mysqli_error($db));
    }

    while ($fila = mysqli_fetch_assoc($result)) {
        $datos[] = $fila;
    }

    mysqli_free_result($result);

    mysqli_close($db);

    return $datos;
}

function eliminarRaza($nombre)
{
    include("../include/db_connection.php");

    $nombre = mysqli_real_escape_string($db, $nombre);
    
    $sql = "DELETE FROM raza WHERE nombre='$nombre'";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error: " . mysqli_error($db));
    }
    
    mysqli_close($db);
}