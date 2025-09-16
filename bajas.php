<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producion de Ovos | Inicio</title>
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="shortcut icon" href="img/gallina.png" type="image/x-icon">
    <!-- Iconos Sharp -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Londrina+Sketch&display=swap" rel="stylesheet">

</head>

<body>
    <?php include('./include/cabecera.php'); ?>
    <main>
        <div class="pure">
            <div class="raza">

                <h3>Bajas de gallinas</h3>
                <div>

                    <?php
                    include_once("model/baja_model.php");
                    $bajas = mostrarBajas();
                    foreach ($bajas as $baja) {
                    ?>
                        <ul>
                            <li><?php echo $baja['nombre'], ', ', $baja['fecha'], ', ', $baja['causa'] ?><a href="controller/muerte_eliminar.php?id=<?php echo $baja['id'] ?>"><img id="muerte" src="./img/eliminar.png" alt="gallina al horno"></a></li>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>


    </main>

    <?php include('./include/pie.php'); ?>
</body>

</html>