<?php

    echo "================Ejercicio 1================<br><br>";
        
        $apellido = "Maldonado";
        $nombre = "Ricardo";

        echo "$apellido, $nombre <br>";

    echo "<br>================Ejercicio 2================<br><br>";

        $x = -3;
        $y = 15;
        
        echo $x + $y . "<br>";

    echo "<br>================Ejercicio 3================<br><br>";

        echo '$x ='." $x <br>";
        echo '$y ='." $y <br>";
        echo '$x + $y = ', $x + $y, "<br>";

    echo "<br>================Ejercicio 4================<br><br>";
        
        $canNum = 0;
        $valor = 0;

        for($i = 1; $i < 1000; $i++)
            {
                $valor += $i;
                $canNum++ ; 
            }
        
        echo "Sumatoria total: " . $valor, "<br>";
        echo "Cant. de Numeros: " . $canNum, "<br>";

    
    echo "<br>================Ejercicio 5================<br><br>";
       
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
            echo "El valor del medio es $valor <br>";
        else 
            echo ("No hay valor del medio <br>");

    echo "<br>================Ejercicio 6================<br>";

        $op1 = rand(0,10);
        $op2 = rand(0,10);
        $operador[0]="+";
        $operador[1]="-";
        $operador[2]="/";
        $operador[3]="*";
        $valor = $operador[rand(0,3)];
        switch($valor)
        {
            case "+":
                    echo "<br>$op1 + $op2 = ", $op1 + $op2, "<br>";
                    break;
            case "-":
                    echo "<br>$op1 - $op2 = ", $op1 - $op2, "<br>";
                    break;
            case "/":
                    if($op2 == 0)
                        echo "$op1 / $op2 = IND.<br>";
                    else
                        echo "<br>$op1 / $op2 = ", $op1 / $op2, "<br>";
                    break;
            case "*":
                    echo "<br>$op1 * $op2 = ", $op1 * $op2, "<br>";
                    break;
        }

    echo "<br>================Ejercicio 7================<br><br>";
    
        echo "Fecha: " . date("d/m/y") ."<br>". " Estacion del Año: ";
        $valor = 0;
        
        if(date("d")<="21" && date("m")<="03" || date("m")== "12") 
                $valor = 1;
        
        if(date("d")<="21" && date("m")>="03" && date("m")<= "06" )
                $valor = 2;
                
        if (date("d")<="21" && date("m")>="07" && date("m")<= "09")
                $valor = 3;

        if(date("d")<="21" && date("m")>="09" && date("m")<= "12")
                $valor = 4;

        switch($valor)
            {
                case 1:
                    echo "Verano";
                    break;
                case 2:
                    echo "Otoño";
                    break;
                case 3:
                    echo "Invierno";
                    break;
                case 4:
                    echo "Primavera";
                    break;           
            }

    echo "<br><br>================Ejercicio 8================<br><br>";

        $num = rand(20,60);
        $base = array('uno','dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve');
        $msg = array('Veinti','Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta');
        
        if($num == 20)
            echo "Num ".$num . " = Veinte";
            elseif( $num >= 21 && $num < 30) 
                echo "Num ".$num . " = " . $msg[0] . $base[$num-21];
        
        if($num > 30 && $num < 40)
            echo "Num " . $num . " = " . $msg[1] . " y " . $base[$num - 31];
            elseif( $num == 30)
                echo "Num " . $num . " = " . $msg[1];

        if($num > 40 && $num < 50)
            echo "Num " . $num . " = " . $msg[2] . " y " . $base[$num - 41];
            elseif($num == 40)
                echo "Num " . $num . " = " . $msg[2];

        if($num > 50 && $num < 60)
            echo "Num " . $num . " = " . $msg[3] . " y " . $base[$num - 51];
            elseif($num == 50)
                echo "Num " . $num . " = " . $msg[3];
        if($num == 60)
            echo "Num " . $num . " = " .$msg[4];

    echo "<br><br>================Ejercicio 9================<br><br>";

        $array = array(rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9));
        $total = 0;
        $igual = 0;
        
        foreach($array as $indx)
        {
                $total += $indx;
                if($indx == 6)
                    $igual ++;
                
        }
        echo  $total . "   => " .  $total / 5 . "<br>"; 
        $total =  $total /5;

        if  ($total > 6)
            echo "El array contiene elementos mayor al valor de 6";
        if  ($total < 6)
            echo "El array contiene elementos menor al valor de 6";
        if  ($igual == 5)
            echo "El array contiene todos los elementos con valor 6";

    echo "<br><br>================Ejercicio 10================<br><br>";

        $array = array();
        $band = 1;
        
        for($i=0; $i<10;$i++)
        {
            if($i % 2 != 0)
            {
                $array[$band]= $i;
                $band ++;
            }
        }

    echo "************LISTA CON FOR************<br><br>";

        $band = 1;
    
        for($i=0; $i<count($array); $i++)
        {
                echo $array[$band]. "  ";
                $band ++;
                     
        }

        echo "<br><br>";
    
    echo "**********LISTA CON FOREACH********<br><br>";
        foreach($array as $indx )
                echo $indx . "   ";
        
        echo "<br><br>";

    echo "**********LISTA CON WHILE**********<br><br>";
        $j = 1;
        while($j <= count($array))
            {
                echo $array[$j] . "  ";
                $j++;
            }
        
    echo "<br><br>================Ejercicio 11================<br><br>";

        $v = array(
            1 => 90,
            30 => 7,
            'e'=> 99,
            'Hola'=> 'mundo',);

        foreach($v as $valor =>$item)
           echo $valor . " => " . $item . "<br>";
        
    
    echo "<br>================Ejercicio 11================<br><br>";
        
        $lap1 = array (
                'Color' => 'Rojo',
                'Marca' => 'BIC',
                'Trazo' => 'Fino',
                'Precio'=> '$10',);
                
        $lap2 = array (
                'Color' => 'Azul',
                'Marca' => 'BIC',
                'Trazo' => 'Grueso',
                'Precio'=> '$12',);    
            
        $lap3 = array (
                'Color' => 'Negro',
                'Marca' => 'Pizzini',
                'Trazo' => '0.5',
                'Precio'=> '$15',);       
        
        echo '######LAPICERA 1######<br>';
        foreach ( $lap3 as $key => $value)
            echo $key . ': ' . $value . '<br>'; 

        echo '<br>######LAPICERA 2######<br>';   
        foreach ( $lap2 as $key => $value )
            echo $key . ': ' . $value . '<br>';

        echo '<br>######LAPICERA 3######<br>';
        foreach ( $lap1 as $key => $value)
            echo $key . ': ' . $value . '<br>';
        
    echo "<br><br>================Ejercicio 13================<br><br>";

        $animales = array();
        $anio = array();
        $lenguajes = array();

        array_push($animales, 'Perro','Gato', 'Raton', 'Arania', 'Mosca');
        array_push($anio, 1986, 1996, 2015, 78, 86);
        array_push($lenguajes, 'php', 'mysql', 'html5', 'typesript', 'ajax' );

        $msg = array_merge($animales, $anio, $lenguajes);

        foreach ($msg as $key => $value) {
                echo $value . ' * ';
        }
 
    echo "<br><br>================Ejercicio 15================<br><br>";

        for($i=1; $i<=5;$i++)
            {
                for($j=1; $j<=5; $j++)
                    echo pow($i,$j) . ' - ';
                echo '<br>';
            }
    
    echo "<br>================Ejercicio 16================<br><br>";

        require_once "./Funciones.php";

        echo __invertir('ABCDE');

        
                
