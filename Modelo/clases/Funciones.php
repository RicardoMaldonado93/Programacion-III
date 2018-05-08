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
        $archivo = fopen("./helados/sabores.txt", "a");
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
            echo "  <div align= 'center'> <table border='2' bordercolor ='green'>
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
                echo "<tr><td align = 'middle'>".strtoupper($sabor[0])."</td>
                      <td align = 'middle' >".strtoupper($sabor[1])."</td>
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

     function borrarHelados($caso , $param)
    {
        $archivo = fopen("./helados/sabores.txt", "r"); 
        $helado = ObtenerHelados(); $band = false;
        
        if($param == 1)
        {
            if($caso != "borrarHelado" && $caso != NULL)
            foreach($helado as $index => $valor)
            {
                if(isset($valor[0]) && $valor[0] == $caso)
                    {
                        echo "SE HA ENCONTRADO EL SABOR " . strtoupper($caso) . "<br>";
                        return $caso;
                    }

            }
            else
            {
                echo "NO SE HA ENCONTRADO EL SABOR **" . strtoupper($caso)."**";
            }
        }
            
        elseif($caso == "borrarHelado")
            {
                
                $archivo = fopen("./helados/sabores.txt", "w+"); 

                foreach($helado as $index => $valor)
                    if(isset($valor[0]) && $valor[0] != $param)
                        $N_helados[] = $valor;
                
                    foreach($helado as $index => $valor)
                        if( $valor[0] == $param)
                            {
                                echo "estoy moviendo el archivo";
                                $name = explode(".", $valor[2]);
                                $rename = $name[0] . "." . "borrado" . "." . date("Hsi") . "." . rtrim($name[2],PHP_EOL);
                                $name = $name[0] . '.' . $name[1] .".". rtrim($name[2], PHP_EOL);
                                $ruta = "./helados/heladosImagen/".$name;
                                $destino ="./clases/heladosBorrados/".$rename;

                                if(copy($ruta,$destino))
                                    unlink($ruta);
                                $band = true;
                            }
                
                foreach($N_helados as $index=> $valor)
                    if( $valor[0] != "")
                        {
                            echo"<br>";
                            $str = $valor[0].'*'.$valor[1].'*'. $valor[2];
                            fwrite($archivo, $str);
                        }
                fclose($archivo);

                if($band == true)
                    return true;
            
                else
                    echo "NO SE ENCUENTRA EL SABOR **" . strtoupper($param) ."**<br>";
            }

    if($band = false)
        echo "NO SE ENCUENTRA EL SABOR **" . strtoupper($param) ."**<br>";
        
    }

    function ModificarHelado($sabor, $precio, $foto)
    {
        $archivo = fopen("./helados/sabores.txt", "r"); 
        $helado = ObtenerHelados();

        foreach($helado as $index => $valor)
            if(isset($valor[0]) && $valor[0] == $sabor)
            {
                if(borrarHelados("borrarHelado", $sabor));
                {
                    cargarHelado($sabor,$precio,$foto);
                    return true;
                }
            }

    } 

    function listar_directorios_ruta($ruta){ 
        // abrir un directorio y listarlo recursivo 
        if (is_dir($ruta)) { 
           if ($dh = opendir($ruta)) { 
              while (($file = readdir($dh)) !== false) { 
                 //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
                 //mostraría tanto archivos como directorios 
                 //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
                 if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
                    //solo si el archivo es un directorio, distinto que "." y ".." 
                    echo "<br>Directorio: $ruta$file"; 
                    listar_directorios_ruta($ruta . $file . "/"); 
                 } 
              } 
           closedir($dh); 
           } 
        }else 
           echo "<br>No es ruta valida"; 
     }
     function listar_archivos($carpeta){
        if(is_dir($carpeta)){
            if($dir = opendir($carpeta)){
                while(($archivo = readdir($dir)) !== false){
                    if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                        echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
                    }
                }
                closedir($dir);
            }
        }
    }
?>