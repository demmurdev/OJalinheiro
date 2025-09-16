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

    <div class="cows card">
        <h3>Top 5 productoras</h3>
        
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
            </tr>
            
            <?php
                include_once("model/estadisticas_model.php");
                $gallinas = mostrarTop5Productoras();
                foreach ($gallinas as $gallina) { ?>
                    <tr>
                        <td><?php echo $gallina['nombre'] ?></td>
                        <td><?php echo $gallina['cantidad_total'] ?></td>
                    </tr>
                    
                    
                    <?php
                }
                ?>
            </table>
            
        </div>
        <div class="cows card">
            <h3>Gallina de la semana</h3>
            
            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Puesta semanal</th>
                </tr>
                
                <?php
                include_once("model/estadisticas_model.php");
                $gallinas = mostrarGallinaSemanal();
                foreach ($gallinas as $gallina) { ?>
                    <tr>
                        <td><?php echo $gallina['nombre'] ?></td>
                        <td><?php echo $gallina['cantidad_total'] ?></td>
                    </tr>
                    
                    
                    <?php
                }
                ?>
            </table>
            
        </div>
        <div class="cows card">
            <h3>Produccion por raza</h3>
            
            <table border="1">
                <tr>
                    <th>Nombre raza</th>
                    <th>Media por dia</th>
                    <th>Media por mes</th>
                </tr>
                
                <?php
                include_once("model/estadisticas_model.php");
                $gallinas = mostrarProduccionRaza();
                foreach ($gallinas as $gallina) { ?>
                    <tr>
                        <td><?php echo $gallina['nombre'] ?></td>
                        <td><?php echo $gallina['media_dia'] ?></td>
                        <td><?php echo $gallina['media_mes'] ?></td>
                    </tr>
                    
                    
                    <?php
                }
                ?>
            </table>
            
        </div>
        <div class="cows card">
            <h3>Produccion semanal detallada</h3>
            
            <table border="1">
                <tr>
                    <th>Dia</th>
                    <th>Cantidad total</th>
                </tr>
                
                <?php
                include_once("model/estadisticas_model.php");
                $gallinas = mostrarSemanalDetallada();
                foreach ($gallinas as $gallina) { ?>
                    <tr>
                        <td><?php echo $gallina['fecha_recogida'] ?></td>
                        <td><?php echo $gallina['cantidad_diaria'] ?></td>
                    </tr>
                    
                    
                    <?php
                }
                ?>
            </table>
            
        </div>
        <div class="cows card">
            <h3>Tres dias de mayor produccion</h3>

            <table border="1">
                <tr>
                    <th>Dia</th>
                    <th>Cantidad total</th>
                </tr>
                
                <?php
                include_once("model/estadisticas_model.php");
                $gallinas = mostrarDiasMayorProduccion();
                foreach ($gallinas as $gallina) { ?>
                    <tr>
                        <td><?php echo $gallina['fecha_recogida'] ?></td>
                        <td><?php echo $gallina['dia'] ?></td>
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