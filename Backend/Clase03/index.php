<?php
    require_once("./persona.php");

    $pers = new Persona("Maria","De las Nieves", "65", 101169);
    $pers2 = new Persona("Juan", "Pintos","37", 452678);

    $var = fopen("./BD.php","a");
    fwrite($var, $pers . PHP_EOL);
    fwrite($var,$pers2 . PHP_EOL);
    
    $arch = fopen("./BD.php", "r");
    $lista = array();

    while(!feof($arch))
        $lista[] = explode("*", fgets($arch));

    foreach($lista as $nom => $value)
    {
        foreach ($value as $item => $valor)
            echo $valor . " ";
        
       // echo "<br>";
    }
    /*
    //fopen("Archivo", Modo (w+ , r+, a+ , x+) )
    $var = fopen("./clase.php","w+");
    fwrite($var, "Ricardo-Maldonado-24" . PHP_EOL);
    fwrite($var, "Juan-Estevez-19" . PHP_EOL);
    fwrite($var, "Natalia-Muñoz-33" . PHP_EOL);
    //fclose($var);
    copy("./clase.php","./clase2.php");

    $arc = fopen("./clase.php","r");
    $nombre = array();
    $lista = array($nombre);
   

    while(!feof($arc))
        //fgets($arc) lee una fila del archivo
        //echo fgets($arc) . "<br>";
        $nombre[] = explode("-", fgets($arc));
    //var_dump($nombre);    

    echo "LISTA <br><br>";
    foreach($nombre as $nom => $value)
    {
        foreach ($value as $item => $valor)
            echo $valor . " ";
        
        echo "<br>";
    }
    //echo "******************<br>";*/

?>