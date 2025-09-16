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

            <div class="cows">
                <h3>Razas de nuestras gallinas</h3>

                <table class="gallini" border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Fecha de alta</th>
                        <th>Fecha de baja</th>
                        <th>Raza</th>
                        <th>Eliminar Gallina</th>
                    </tr>

                    <?php
                    include_once("model/gallina_model.php");
                    $gallinas = mostrarGallinas();
                    foreach ($gallinas as $gallina) { ?>
                        <tr>
                            <td><?php echo $gallina['nombre'] ?></td>
                            <td><?php echo $gallina['fecha_nacimiento'] ?></td>
                            <td><?php echo $gallina['fecha_alta'] ?></td>
                            <td><?php echo $gallina['fecha'] ?></td>
                            <td><?php echo $gallina['nombre_raza'] ?></td>
                            <td><a href="controller/gallina_eliminar.php?id=<?php echo $gallina['id'] ?>"><img id="muerte2" src="./img/pollo-asado.png" alt="gallina al horno"></a></td>
                        </tr>


                    <?php
                    }
                    ?>
                </table>

            </div>

        </div>


    </main>

    <?php include('./include/pie.php'); ?>
</body>

</html>