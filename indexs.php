<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ordenadores Colegios</title>
        <link media="all" href="css/style.css" rel="stylesheet" type="text/css"></link>
        <link href="css/formcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">  
                    <img src="img/logo_vdc.jpg" width="75%" alt="logo_vdc"/>
                </div>
                <div id="title">
                    Ordenadores Colegios
                </div>
            </div>
            <div id="content">
                <?php
                include 'conexion.php';
                // Elegir los datos que deseamos recuperar de la tabla
                $query = "SELECT id, nombre, dirrecion, telefono, poblacion  "
                        . "FROM centro ";
                if ($stmt = $conexion->prepare($query)) {
                    if (!$stmt->execute()) {
                        die('Error de ejecución de la consulta. ' . $conexion->error);
                    }
                    //echo $query;
                    // recoger los datos
                    $stmt->bind_result($id, $nombre, $dirrecion, $telefono, $poblacion);
                    // enlace a alta de cliente
                    echo "<div>";
                    echo "<a href='altas.php'>Alta ordenadores</a>";
                    echo "<a href='incidencias.php'>Añadir incidencia</a>";
                    echo "</div>";
                    //cabecera de los datos mostrados
                    echo "<table>"; //start table
                    //creating our table heading
                    echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Dirreción</th>";
                    echo "<th>telefono</th>";
                    echo "<th>poblacion</th>";
                    echo "</tr>";
                    //recorrido por el resultado de la consulta
                    while ($stmt->fetch()) {
                        echo "<tr>";
                        echo '<form method="get" action="altas_especifico.php">';
                        echo '<td><input type="text" name="idCentro" size="3" value="' . $id . '" readonly /></td>';
                        echo '<td><input type="text" name="nombreCentro" value="' . $nombre . '" readonly /></td>';
                        echo '<td><input type="text" name="dirrecion" value="' . $dirrecion . '" readonly /></td>';
                        echo '<td><input type="text" name="telefono" value="' . $telefono . '" readonly /></td>';
                        echo '<td><input type="text" name="poblacion" value="' . $poblacion . '" readonly /></td>';
                        echo '<td>';
                        echo '<input type="submit" value="Añadir para este centro">';
                        echo '<input type="button" value="Lista este centro" onclick = "this.form.action = lista.php">';
                        echo '</form></td>';

                        echo "</tr>\n";
                    }
                    // end table
                    echo "</table>";
                    $stmt->close();
                } else {
                    die('Imposible preparar la consulta. ' . $conexion->error);
                }
                ?>
            </div>
            <div id="footer">
                <div id="subtitle">  
                    <a href="http://www.valencianadecopias.es"> Valenciana De Copias S.L. </a>
                </div>
            </div>
        </div>
    </body>
</html>
