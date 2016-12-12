<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// insert query
    

            $query = <<< SQL
                    "INSERT INTO `vdc-ordenadores`.`ordenadores`"
                    . " (`id`, `id_ordenador`, `centro_id`, `aula`, `so_id`, `departamento`, `baja`)"
                    . "  VALUES (NULL, ?, ?, ?, ?, ?, ?)";
SQL;
