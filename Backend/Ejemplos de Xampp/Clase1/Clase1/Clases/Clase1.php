<?php
    //require "../Funciones/F1.php";
    $_nombre = "Jose";
    echo 'Hola Mundo $_nombre';
    
    $_edad = 20;
    $_sueldo = 8500.00;

    print("<br/>edad $_edad");
    printf("<br/>sueldo %.2f", $_sueldo);

    echo "<br/>";
    echo strtoupper($_nombre);

    echo "<br/>";
    $array1 = array(1,3,5,7,9,11,13,17,19,23);
    var_dump($array1);

    echo "<br/>";

    $arr2["nombre"] = 1;
    $arr2[22] = 3;
    $arr2[] = 5;
    $arr2[] = 10;
    $arr2[] = 15;

    var_dump($arr2);

    echo "<br/>";

    foreach($arr2 as $valor)
        echo "$valor <br>";

    foreach($arr2 as $id => $valor)
        echo "$id => $valor <br>";

    echo "-------Formas de Listar Arrays-------------<br>";
    
    echo "Sort <br/>";
    sort($array1);
        foreach($array1 as $id => $valor)
        echo "$id => $valor <br>";
    
    echo "--------------------<br>";

    echo "RSort <br/>";
    rsort($array1);
        foreach($array1 as $id => $valor)
        echo "$id => $valor <br>";
    echo "--------------------<br>";
    
    echo "KSort <br/>";
    ksort($array1);
        foreach($array1 as $id => $valor)
        echo "$id => $valor <br>";
    echo "--------------------<br>";

    echo "ASort <br/>";
    asort($array1);
        foreach($array1 as $id => $valor)
        echo "$id => $valor <br>";
    echo "--------------------<br>";

    echo "ARSort <br/>";
    arsort($array1);
        foreach($array1 as $id => $valor)
        echo "$id => $valor <br>";
    echo "--------------------<br>";

    echo "KRSort <br/>";
    krsort($array1);
        foreach($array1 as $id => $valor)
        echo "$id => $valor <br>";
    echo "--------------------<br>";