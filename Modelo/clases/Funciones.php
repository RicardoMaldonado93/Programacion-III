<?php

   require_once ("./clases/Cliente.php");
   require_once ("./clases/Helado.php");

   function Validar($correo, $pass)
    {
        $archivo = fopen("./clientes/clientesActuales.txt", "r");
        $clientes = array();
        $msg = -1;
        
        if($archivo != false )
            while(!feof($archivo))
                $clientes[] = explode("*", fgets($archivo));

        foreach($clientes as $clave => $campo)
        {   
                if( isset($campo[1]) && $campo[1] == $correo && isset($campo[2]) && trim($campo[2] )== $pass )
                     $msg = "Cliente Logueado: " . strtoupper($campo[0])."<br>";
        }
        if ($msg == -1)
            $msg = "Cliente Inexistente";
        
        fclose($archivo);
        return $msg;

    }

     function cargarCliente($nombre, $correo, $clave)
    
    {
        $cliente = new Cliente($nombre, $correo, $clave);
        $archivo = fopen("./clientes/clientesActuales.txt", "a+");

        if(fwrite($archivo, $cliente->__toString()) != false)
            echo "SE AGREGO EL CLIENTE CORRECTAMENTE<br>";
        else 
            echo "ERROR AL AGREGAR CLIENTE<br>";

        fclose($archivo);

    }

     function cargarHelado($sabor, $precio, $foto)
    {
        $helado = new Helado($sabor, $precio, $foto);
        $archivo = fopen("./helados/sabores.txt", "a+");
        if(fwrite($archivo, $helado->__toString()) != false)
            if(move_uploaded_file($foto['imagen']['tmp_name'], "./helados/heladosImagen/". $helado->Archivo($foto)))
                echo "SE AGREGO CORRECTAMENTE EL SABOR<br>";
            else 
                echo "ERROR AL AGREGAR EL SABOR<br>";
        
        fclose($archivo);
    }

     function Vender($sabor, $cant)
    {
        $archivo = fopen("./helados/sabores.txt", "r");
        $helados = array();
        $Nhelado = array(); 
        $precioTotal; 
        $band = 0;

        if($archivo != false)
            while(!feof($archivo))
                $helados[]= explode("*",fgets($archivo));
        
                
                echo "<br>";

        foreach($helados as $ind => $sab)
        {   
            if($sab[0] == $sabor && isset($sab[0]) ) 
            {
                $Nhelado = array( 
                                    0 => $sab[0],
                                    1 => $sab[1],
                                    2 => trim ($sab[2]," "),
                                );
                $band = 1;
            }
        }
        
        fclose($archivo);
        
        if($band == 1)
        {
            $heladoNuevo = new Helado($Nhelado[0],$Nhelado[1],$Nhelado[2]);
            $precioTotal =  $heladoNuevo->PrecioMasiva() * $cant;
            $archivo = fopen("./helados/vendidos.txt", "a+");
            fwrite($archivo, $Nhelado[0] . "*" . $Nhelado[1] . "*" . $precioTotal . PHP_EOL );
            fclose($archivo);
            $msg = "*****TOTAL A PAGAR $" . $precioTotal ."*****<br>";
        
            return $msg;
        }
        if($band == 0)
            echo "NO SE ENCUENTRA EL SABOR: " . strtoupper($sabor) ."<br>";

        
    }

     function ListadoHelados()
    {
        $helados = Helado::Lista();
        $ruta;
   echo "    <div align= 'center'> <table border='2' bordercolor ='green'>
                    <th colspan='3'>HELADOS</th>
                    <tr>
                    <th>SABOR</th>
                    <th>PRECIO</th>
                    <th>IMAGEN</th>
                    <tbody>
                        ";
        foreach($helados as $campo => $sabor)
            if(isset($sabor[0]) && isset($sabor[1]) && isset($sabor[2]))
            {
                
                $ruta = "./helados/heladosImagen/". $sabor[2];
                echo "<tr><td align = 'middle' >".$sabor[0]."</td>
                      <td align = 'middle' >".$sabor[1]."</td>
                      <td>";
                      echo "<img src='" . $ruta . "' width = '80px' heigth = '80px'>";
                echo"</td></tr></div>";
   
                
            }
    }

     function ObtenerHelados()
    {
        $archivo = fopen("./helados/sabores.txt", "r");
        $helados = array();
        
        while(!feof($archivo))
            $helados[] = explode("*",fgets($archivo));

        fclose($archivo);

        return $helados;
    }

     function borrarHelados($caso)
    {
        $archivo = fopen("./helados/sabores.txt", "a+"); 
        $helado = ObtenerHelados();
        $band = false ; $saborObtenido;
        

        if($caso != "borrarHelado" && $caso != NULL)
            foreach($helado as $index => $valor)
            {
                if(isset($valor[0]) && $valor[0] == $caso)
                    {
                        $saborObtenido = $caso;
                        $band = true;
                    }

            }
        var_dump($caso);
        if($band == true && $caso != NULL)
        {
            if($caso == "borrarHelado")
                {

                    foreach($helados as $index => $valor)
                        if(isset($valor) && $valor != $saborObtenido)
                        {
                            $N_helados[] = $valor;
                            $name = explode(".", $valor[2]);
                            $rename = $name[0] . "." . "borrado" . date("Hsi") . "." . $name[2];
                            if(move_uploaded_file("./helados/heladosImagen/".$valor[2], "./heladosBorrados" . $rename))
                                echo "SE HA LOGRADO BORRAR EL SABOR " . strtoupper($name[0]) . "<br>";
                        }

                    foreach($N_helados as $index=> $valor)
                        fwrite($archivo, $valor[0].'*'.$valor[1].'*'.$valor[2]. PHP_EOL);
                    
                    fclose($archivo);
                }
        }

        if($band == false)
                echo "NO EXISTE EL SABOR<br>";
    }

?>