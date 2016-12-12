<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/formcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include 'conexion.php';
        if ($_POST) {
            // include conexión a la base de datos
            include 'conexion.php';
            // insert query
            $query = "INSERT INTO `vdc-ordenadores`.`incidencias` (`id`, `ordenadores_id`, `descripcion`, `fecha`)"
                    . " VALUES (NULL, ?, ?, ?);";
            //echo $query, "<br>";
            // prepare query for execution
            if ($stmt = $conexion->prepare($query)) {
                echo "<div>registro preparado.</div>";
            } else {
                die('Imposible preparar el registro.' . $conexion->error);
            }
            //echo $_POST['ordenadores_id'], $_POST['incidencia'], $_POST['fecha'];
            // asociar los parámetros
            $stmt->bind_param('iss', $_POST['ordenadores_id'], $_POST['incidencia'], $_POST['fecha']);
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<div>Registro guardado.</div>";
            } else {
                die('Imposible guardar el registro: ' . $conexion->error);
            }
        }
        ?>
        <h1>Incidencias</h1>
        <form action="incidencias.php" method="post">
            <table border="0">
                <tr>
                    <td>id</td>
                    <td><input type='number' name='ordenadores_id' required/></td>
                </tr>
                <tr>
                    <td>incidencia</td>
                    <td><input type='text' name='incidencia' /></td>
                </tr>
                <tr>
                    <td>fecha</td>
                    <td><input type="date" name="fecha" step="1"  value="<?php echo date("Y-m-d"); ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="save" value="Save"/>
                        <a href="./index.php">Volver al inicio</a>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
