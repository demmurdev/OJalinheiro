<?php

function mostrarProduccionGallinas($fecha)
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT *
FROM gallina
WHERE gallina.id NOT IN (
SELECT gallina.id 
FROM gallina JOIN baja
ON gallina.id=baja.id_gallina
WHERE baja.fecha<'$fecha')";

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

function mostrarGallinasVivas()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT *
FROM gallina
WHERE gallina.id NOT IN (
SELECT gallina.id 
FROM gallina JOIN baja
ON gallina.id=baja.id_gallina)";

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


function insertarGallina($nombre, $fecha_nacimiento, $fecha_alta, $nombre_raza)
{
    include("../include/db_connection.php");

    $nombre    = mysqli_real_escape_string($db, $nombre);
    $fecha_nacimiento = mysqli_real_escape_string($db, $fecha_nacimiento);
    $fecha_alta = mysqli_real_escape_string($db, $fecha_alta);
    $nombre_raza    = mysqli_real_escape_string($db, $nombre_raza);

    $sql = "INSERT INTO gallina (nombre, fecha_nacimiento, fecha_alta, nombre_raza)
            VALUES ('$nombre', '$fecha_nacimiento', '$fecha_alta','$nombre_raza')";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error al insertar comercial: " . mysqli_error($db));
    }

    $nuevoId = mysqli_insert_id($db);

    mysqli_close($db);

    return $nuevoId;
}

function eliminarGallina($id)
{
    include("../include/db_connection.php");

    $id = mysqli_real_escape_string($db, $id);

    $sql = "DELETE FROM gallina WHERE id=$id";

    $resultado = mysqli_query($db, $sql);

    if (!$resultado) {
        exit("Error: " . mysqli_error($db));
    }

    mysqli_close($db);
}

function mostrarGallinas()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT *
FROM gallina LEFT JOIN baja
ON gallina.id=baja.id_gallina";

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

function produccionDelDia($fecha)
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT p.*, g.nombre FROM produccion p JOIN gallina g ON p.id_gallina=g.id WHERE fecha_recogida='$fecha'";

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