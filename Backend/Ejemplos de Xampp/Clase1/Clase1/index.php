<?php
    //require "clase2.php"; //tira fatal error en vez de warning
    //include_once "clase1.php"; //lo incluye una sola vez

    /*Clase 1
        --index.php
        --funciones
            --f1.php
                --echo
        --Clases
            --clase1.php
        

    */

    require "./Clases/clase1.php";
    require "./Funciones/F1.php";
    saludar("Ricardo","Maldonado");