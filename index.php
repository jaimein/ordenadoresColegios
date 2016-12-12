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
                include 'controlador.php'; //Ahora mostramos la pagina llamada
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