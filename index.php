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
            <div class="produc card">
                <h3>Produccion Diaria</h3>
                <div>
                    <form class="fech" action="index.php" method="get">
                        <label for="fecha">Fecha: </label>
                        <?php
                        $fecha = date("Y-m-d");
                        if (isset($_GET['fecha'])) {
                            $fecha = $_GET['fecha'];
                        }
                        ?>
                        <input class="boton" type="date" name="fecha" value='<?php echo $fecha; ?>'>
                        <input class="boton" type="submit" value="Enviar">
                    </form>
                </div>
                <form class="for" action="controller/produccion_insertar.php" method="post">
                    <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                    <?php
                    include_once('model/gallina_model.php');

                    // funcion devuelva produccion en ese dia
                    $producciones = produccionDelDia($fecha);
                    if (count($producciones) == 0) {
                        $gallinas = mostrarProduccionGallinas($fecha);
                        foreach ($gallinas as $gallina) {
                    ?> <div class="gall">
                                <p class="pp"><?php echo $gallina['nombre'] ?></p>
                                <input class="cantidad" type="radio" name="<?php echo $gallina['id'] ?>" id="<?php echo $gallina['id'] ?>0" value="0" checked>
                                <label for="<?php echo $gallina['id'] ?>0">0</label>
                                <input class="cantidad" type="radio" name="<?php echo $gallina['id'] ?>" id="<?php echo $gallina['id'] ?>1" value="1">
                                <label for="<?php echo $gallina['id'] ?>1">1</label>
                                <input class="cantidad" type="radio" name="<?php echo $gallina['id'] ?>" id="<?php echo $gallina['id'] ?>2" value="2">
                                <label for="<?php echo $gallina['id'] ?>2">2</label>
                                <input type="hidden" name="gallinas[]" value="<?php echo $gallina['id'] ?>">
                            </div>

                        <?php
                        }
                    } else {
                        foreach ($producciones as $produccion) {
                        ?>
                            <div class="gall">
                                <p class="pp"><?php echo $produccion['nombre'] ?></p>
                                <input class="cantidad" type="radio" name="<?php echo $produccion['id_gallina'] ?>" id="<?php echo $produccion['id_gallina'] ?>0" value="0" <?php if ($produccion['cantidad'] == 0) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                <label for="<?php echo $produccion['id_gallina'] ?>0">0</label>
                                <input class="cantidad" type="radio" name="<?php echo $produccion['id_gallina'] ?>" id="<?php echo $produccion['id_gallina'] ?>1" value="1" <?php if ($produccion['cantidad'] == 1) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                <label for="<?php echo $produccion['id_gallina'] ?>1">1</label>
                                <input class="cantidad" type="radio" name="<?php echo $produccion['id_gallina'] ?>" id="<?php echo $produccion['id_gallina'] ?>2" value="2" <?php if ($produccion['cantidad'] == 2) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                <label for="<?php echo $produccion['id_gallina'] ?>2">2</label>
                                <input type="hidden" name="gallinas[]" value="<?php echo $produccion['id_gallina'] ?>">
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <div>
                        <input class="boton" type="submit" value="Enviar">
                    </div>
                </form>
                <a href="estadisticas.php">Estadisticas</a>
            </div>
            <div class="produc">
                <div class="produc card">
                    <h3>Nueva raza</h3>
                    <form class="produc" action="controller/raza_inserta.php" method="post">
                        <label for="raza">Nombre Raza</label>
                        <input class="boton" type="text" name="raza" id="raza" required>
                        <label for="des_raza">Descripcion Raza</label>
                        <input class="boton" type="text" name="des_raza" id="des_raza">
                        <input class="boton" type="submit" value="Enviar">
                    </form>
                    <a href="razas.php">Consultar Razas</a>
                </div>
                <div class="produc card">
                    <h3>Nueva gallina</h3>
                    <form class="produc" action="controller/gallina_insertar.php" method="post">
                        <label for="newcow">Nombre Gallina</label>
                        <input class="boton" type="text" name="newcow" id="newcow" required>
                        <label for="nacimiento">Fecha nacimiento</label>
                        <input class="boton" type="date" name="nacimiento" id="nacimiento">
                        <label for="alta">Fecha de alta</label>
                        <input class="boton" type="date" name="alta" id="alta" required>
                        <p>Raza</p>
                        <select class="boton" name="nombre_raza" id="razas">
                            <?php
                            include_once("model/raza_model.php");
                            $razas = mostrarRazas();
                            foreach ($razas as $raza) {
                            ?>
                                <option value="<?php echo $raza['nombre'] ?>"><?php echo $raza['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input class="boton" type="submit" value="Enviar">
                    </form>
                    <a href="gallinas.php">Consultar Gallinas</a>
                </div>
                <div class="produc card">
                    <h3>Baja gallina</h3>
                    <form class="produc" action="controller/muerte_inserta.php" method="post">
                        <p>Nombre Gallina</p>
                        <select class="boton" name="nombreb" id="baja">
                            <?php
                            include_once("model/gallina_model.php");
                            $gallinas = mostrarGallinasVivas();
                            foreach ($gallinas as $gallina) { ?>
                                <option value="<?php echo $gallina['id'] ?>"><?php echo $gallina['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="baja">Fecha de baja</label>
                        <input class="boton" type="date" name="baja" id="baja" value='<?php echo date("Y-m-d"); ?>' required>
                        <p>Motivo</p>
                        <select class="boton" name="motivo" id="motivo">
                            <option value="sacrificada">Sacrificada</option>
                            <option value="natural">Muerte natural</option>
                        </select>
                        <input class="boton" type="submit" value="Enviar">
                    </form>
                    <a href="bajas.php">Consultar Bajas</a>
                </div>
            </div>
        </div>
    </main>

    <?php include('./include/pie.php'); ?>
</body>

</html>