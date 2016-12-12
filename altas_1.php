<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir Ordenador</title>
        <link href="css/formcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // include conexión a la base de datos
        include 'conexion.php';
        ?>
        <?php
        if ($_POST) {
           
    
    
  
// insert query
            $query = <<< SQL
                    "INSERT INTO `vdc-ordenadores`.`ordenadores`"
                    . " (`id`, `id_ordenador`, `centro_id`, `aula`, `so_id`, `departamento`, `baja`)"
                    . "  VALUES (NULL, ?, ?, ?, ?, ?, ?)";

SQL;

            echo $query, "<br>";

            //prueba
            
                //echo $_POST['id_ordenador'], $_POST['centro'], $_POST['aula'], $_POST['so'], $_POST['departamento'], "0";
            //
             // prepare query for execution
            if ($stmt == $conexion->prepare($query)) {
                echo "<div>registro preparado.</div>";
            
                
                
            } else {
                echo $stmt;
                echo "hola";
                die('Imposible preparar el registro.' . $conexion->error);
            }

            //prueba
            //
                echo $_POST['id_ordenador'], $_POST['centro'], $_POST['aula'], $_POST['so'], $_POST['departamento'];
            //
            // asociar los parámetros
            $stmt->bind_param('iisisi', $_POST['id_ordenador'], $_POST['centro'], $_POST['aula'], $_POST['so'], $_POST['departamento'], "0");

           
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<div>Registro guardado.</div>";
            } else {
                die('Imposible guardar el registro: ' . $conexion->error);
            }
        }
        ?>
        <h1>Alta Cliente</h1>
        <form action='altas.php' method='post'>
            <table border='0'>
                <tr>
                    <td>id</td>
                    <td><input type='number' name='id_ordenador' /></td>
                </tr>
                <tr>
                    <td>centro</td>
                    <td>
                        <select name='centro'>
                            <option value='' selected='selected'>- Sin Centro -</option>
                            <?php
                            $centroasignado = "SELECT id, nombre FROM centro";
                            echo $centroasignado;
                            if ($stmt = $conexion->prepare($centroasignado)) {
                                if (!$stmt->execute()) {
                                    die('Error de ejecución de la consulta. ' . $conexion->error);
                                };
                                $stmt->bind_result($id, $nombre);

                                while ($stmt->fetch()) {
                                    echo "<option value='" . $id . "'>" . $nombre . "</option>";
                                    $centrorowasignado = mysql_fetch_array($centroqueryasignado);
                                }
                            };
                            ?>                
                        </select>

                    </td>
                </tr>

                <tr>
                    <td>aula</td>
                    <td><input type='text' name='aula' /></td>
                </tr>
                <tr>
                    <td>departamento/lugar</td>
                    <td><input type='text' name='departamento' /></td>
                </tr>
                <tr>
                    <td>so</td>
                    <td>
                        <select name='so'>
                            <option value='' selected='selected'>- Sin SO -</option>
                            <?php
                            $asignado = "SELECT id, descripcion FROM so";
                            echo $asignado;
                            if ($stmt = $conexion->prepare($asignado)) {
                                if (!$stmt->execute()) {
                                    die('Error de ejecución de la consulta. ' . $conexion->error);
                                };
                                $stmt->bind_result($id, $descripcion);

                                while ($stmt->fetch()) {
                                    echo "<option value='" . $id . "'>" . $descripcion . "</option>";
                                    $rowasignado = mysql_fetch_array($queryasignado);
                                }
                            };
                            ?>
                        </select>

                    </td>
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
