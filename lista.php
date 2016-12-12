<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Clientes</title>
    </head>
    <body>
        <h1>Listado de Clientes</h1>
        <?php
        if ($_GET) {
            $idCentro = $_GET['idCentro'];
            $nombreCentro = $_GET['nombreCentro'];
            echo $idCentro;
        }
        // Elegir los datos que deseamos recuperar de la tabla
        $query = "SELECT  *  "
                . "FROM `ordenadores` "
                . "WHERE `centro_id` =? "
                . "AND `baja` =0 "
                . "ORDER BY `ordenadores`.`id` ASC ";
        $stmt->bind_param('i', $idCentro);
        if ($stmt = $conexion->prepare($query)) {
            if (!$stmt->execute()) {
                die('Error de ejecución de la consulta. ' . $conexion->error);
            }
            // recoger los datos
            $stmt->bind_result($id,$id_ordenador, $aula, $so_id, $departamento, $baja);
            // enlace a alta de cliente
            echo "<div>";
            echo "<a href='index.php?accion=altas'>Alta cliente</a>";
            echo "</div>";
            //cabecera de los datos mostrados
            echo "<table>"; //start table
            //creating our table heading
            echo "<tr>";
            echo "<th>NIF</th>";
            echo "<th>Nombre</th>";
            echo "<th>Dirreción</th>";
            echo "<th>telefono</th>";
            echo "<th>poblacion</th>";
            echo "</tr>";
            //recorrido por el resultado de la consulta
            while ($stmt->fetch()) {
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$aula</td>";
                echo "<td>$so_id</td>";
                echo "<td>$departamento</td>";
                echo "<td>$baja</td>";
                echo "<td>";
                // Este enlace es para modificar el registro
                echo "<a href='index.php?accion=edita&id={$id}'>Edita</a>";
                echo " / ";
                // Este enlace es para borrar el registro y también se explicará más tarde
                echo "<a href='javascript:borra_cliente(\"$id\")'> Elimina </a>";
                echo "</td>";
                echo "</tr>\n";
            }
            // end table
            echo "</table>";
            $stmt->close();
        } else {
            die('Imposible preparar la consulta. ' . $conexion->error);
        }
        ?>


    </body>
</html>
