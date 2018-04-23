<?php

    //Ejercicio 1
    echo "------------Ejercicio 1------------<br><br>";
    $apellido = "Maldonado";
    $nombre = "Ricardo";

    echo "$apellido, $nombre <br>";

    //Ejercicio 2
    echo "<br>------------Ejercicio 2------------<br><br>";

    $x = -3;
    $y = 15;
    
    echo $x + $y . "<br>";

    //Ejercicio 3 
    echo "<br>------------Ejercicio 3------------<br><br>";

    echo '$x ='." $x <br>";
    echo '$y ='." $y <br>";
    echo '$x + $y = ', $x + $y, "<br>";

    //Ejercicio 4
    echo "<br>------------Ejercicio 4------------<br><br>";
    $canNum = 0;
    $valor = 0;

    for($i = 1; $i < 1000; $i++)
        {
            $valor += $i;
            $canNum++ ; 
        }
    
    echo "Sumatoria total: " . $valor, "<br>";
    echo "Cant. de Numeros: " . $canNum, "<br>";

    //Ejercio 5
    echo "<br>------------Ejercicio 5------------<br><br>";
    $a = rand(0,10);
    $b = rand(0,10);
    $c = rand(0,10);

    echo "A = $a, B = $b, C = $c <br>";
    $valor = -1;

    if($a < $b && $a < $c)
        if($b < $c )
            $valor = $b;
        elseif($b > $c)
            $valor = $c;

    if($b < $a && $b < $c)
        if($a < $c )
            $valor  = $a;
        elseif($a > $c)
            $valor = $c;
    
    if ($c < $a && $c < $b)
        if ($a < $b)
            $valor = $a;
        elseif($a > $b)
            $valor = $b;


    if ($valor != -1 )
        echo "El valor del medio es $valor<br>";
    else 
        echo ("No hay valor del medio <br>");

    echo "<br>------------Ejercicio 6------------<br><br>";

    $op1 = rand(0,10);
    $op2 = rand(0,10);
    $operador = "";

    