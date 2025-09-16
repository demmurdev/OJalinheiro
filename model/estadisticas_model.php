<?php

function mostrarTop5Productoras()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT g.id,g.nombre,AVG(cantidad) AS media_dia,SUM(cantidad) AS cantidad_total
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
GROUP BY g.id
ORDER BY media_dia DESC
LIMIT 5";

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


function mostrarGallinaSemanal()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT g.id,g.nombre,AVG(cantidad) AS media_dia,SUM(cantidad) AS cantidad_total
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
WHERE fecha_recogida >= CURRENT_DATE - INTERVAL 7 DAY
GROUP BY g.id
ORDER BY media_dia DESC
LIMIT 1";

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


function mostrarProduccionRaza()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT r.nombre, ROUND(AVG(cantidad),2) AS media_dia, ROUND(AVG(cantidad)*30,2) AS media_mes
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
JOIN raza r
ON r.nombre=g.nombre_raza
GROUP BY r.nombre
ORDER BY media_dia DESC";

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



function mostrarSemanalDetallada()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT fecha_recogida, SUM(cantidad) AS cantidad_diaria
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
WHERE fecha_recogida >= CURRENT_DATE - INTERVAL 7 DAY
GROUP BY fecha_recogida DESC";

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


function mostrarDiasMayorProduccion()
{
    include("include/db_connection.php");

    $datos = [];

    $sql = "SELECT fecha_recogida, SUM(cantidad) AS dia
FROM produccion
GROUP BY fecha_recogida
ORDER BY SUM(cantidad) DESC
LIMIT 3";

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