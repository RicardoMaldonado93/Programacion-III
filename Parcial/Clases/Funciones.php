<?php

    require_once "./Clases/Alumno.php";
    require_once "./Clases/Materia.php";
    require_once "./Clases/Archivo.php";

    function cargarAlumno($nombre, $apellido, $email, $foto)
    {
        $alumno = new Alumno($nombre, $apellido, $email, $foto);
        if(escribirArchivo("./Clases/Registros/Alumnos.txt", $alumno))
            if(guardarFoto("./Clases/Registros/Fotos/", $foto, $alumno->__GET('foto')))
                echo strtoupper("Se ha podido guardar el alumno<br>");
            else
                echo strtoupper("No se ha podido guardar la foto del alumno<br>");
        else
            echo strtoupper("error al guardar el alumno");
    }

    function consultarAlumno($apellido)
    {
        $lista = leerArchivo("./Clases/Registros/Alumnos.txt");
        $band = false;

        foreach($lista as $alumno => $ind)
        {
            if(isset($ind[1]) && $ind[1] == $apellido)
                {
                   $band = true;
                }
        }

        if($band)
            echo strtoupper("el alumno " . $apellido . " ya se encuentra registrado!!!<br>");
        
        else
            echo strtoupper("No existe alumno con apellido  " . $apellido ."<br>");
    }

    function cargarMateria($nombre_materia, $codigo_materia, $cupo_alumnos, $aula)
    {
        $materia = new Materia($nombre_materia, $codigo_materia, $cupo_alumnos, $aula);
        if(escribirArchivo("./Clases/Registros/Materias.txt", $materia))
            echo strtoupper("se ha podido agregar la materia<br>");
        else
            echo strtoupper("error al agregar la materia<br>");
    }

    function inscribirAlumno($nombre, $apellido, $email, $materia, $codigo)
    {
        $materias = leerArchivo("./Clases/Registros/Materias.txt");
        $cupo; $N_materias = array(); $no_cupos= true; $materia_nueva;
        $no_materia = false;
    
        foreach($materias as $materia => $ind)
        {
            if(isset($ind[1]) && $ind[1] == $codigo)
            {
                $no_materia= false;
                break;
            }
            elseif(isset($ind[1]) && $ind[1] != $codigo)
            {
               $no_materia= true;
            }
        }

        if($no_materia == false)
        {
            foreach($materias as $materia => $ind)
            {
                
                if(isset($ind[1]) && $ind[1] == $codigo )
                {
                    if ($ind[2] > 0)
                    {
                        //si hay cupo, se resta uno y se crea el nuevo objeto con los datos actualizados       
                        $cupo = $ind[2] - 1;
                        $materia_nueva = new Materia ($ind[0],$ind[1],$cupo,$ind[3]);
                        $no_cupos = false;
                    }
                    else
                    {
                        //sino hay cupos se crea el objeto con sus respectivos valores
                        $no_cupos = true;
                        $materia_nueva = new Materia ($ind[0],$ind[1],'0',$ind[3]);
                        
                    }
                }
                
                if(isset($ind[1]) && $ind[1] != $codigo )
                {
                    //creo la nueva lista con valores actualizados
                    $N_materias[] = $ind;
                }
            }

            if($no_cupos == false)
            {
                
                //si quedan cupos se guarda la info con los nuevos datos
    
                $archivo = fopen("./Clases/Registros/Materias.txt", "w+");
                foreach($N_materias as $m => $ind)
                {
                    $str = $ind[0] . "*" . $ind[1] . "*" . $ind[2] . "*" . $ind[3];
                    fwrite($archivo, $str);
                
                }
                
                if(fwrite($archivo, $materia_nueva))
                    if(escribirArchivo("./Clases/Registros/Inscriptos.txt", $nombre. "*" . $apellido . "*" . $email. "*" . $materia_nueva . PHP_EOL))
                        echo strtoupper("se ha inscripto el alumno correctamente");
            }
    
            if($no_cupos == true)
            {
                echo strtoupper("no hay cupos para la materia");
            }
        }

        if($no_materia == true)
        {
            echo strtoupper("la materia no existe<br>");
        }
        

        
    }

    /*function inscripciones()
    {
        $ins = leerArchivo("./Clases/Registros/Inscriptos.txt");

            echo "  <div align= 'center'> <table border='2' bordercolor ='green'>
                    <th colspan='6'>INSCRIPTOS</th>
                    <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>EMAIL</th>
                    <th>MATERIA</th>
                    <th>CODIGO</th>
                    <th>AULA</th>
                    <tbody>
                        ";
        foreach($ins as $campo => $valor)

            if(isset($valor[0]) && isset($valor[1]) && isset($valor[2]) && isset($valor[3]) && isset($valor[4]) && isset($valor[6]))
            {
                
                echo "<tr><td align = 'middle'>".$valor[0]."</td>
                      <td align = 'middle' >".$valor[1]."</td>
                      <td align = 'middle'>".$valor[2]."</td>
                      <td align = 'middle'>".$valor[3]."</td>
                      <td align = 'middle'>".$valor[4]."</td>
                      <td align = 'middle'>".$valor[6]."</td>";
                echo"</tr></div>";
   
                
            }
        


    }*/
    function inscripciones($param)
    {
        $ins = leerArchivo("./Clases/Registros/Inscriptos.txt");
        $band = 0; 
        $str;
        echo "  <div align= 'center'> <table border='2' bordercolor ='green'>
        <th colspan='6'>INSCRIPTOS</th>
        <tr>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>EMAIL</th>
        <th>MATERIA</th>
        <th>CODIGO</th>
        <th>AULA</th>
        <tbody>
            ";

        
        if( $param = " ")
        {
            foreach($ins as $reg => $valor)
            {
    
                if(isset($valor[2]) && $valor[3])
                {   
                   echo "<tr><td align = 'middle'>".$valor[0]."</td>
                          <td align = 'middle' >".$valor[1]."</td>
                          <td align = 'middle'>".$valor[2]."</td>
                          <td align = 'middle'>".$valor[3]."</td>
                          <td align = 'middle'>".$valor[4]."</td>
                          <td align = 'middle'>".$valor[6]."</td></tr></div>";
                    $band = 1;
                }
            
            }
        }

        foreach($ins as $reg => $valor)
        {

            if(isset($valor[2]) && $valor[1] == $param)
            {   
               echo "<tr><td align = 'middle'>".$valor[0]."</td>
                      <td align = 'middle' >".$valor[1]."</td>
                      <td align = 'middle'>".$valor[2]."</td>
                      <td align = 'middle'>".$valor[3]."</td>
                      <td align = 'middle'>".$valor[4]."</td>
                      <td align = 'middle'>".$valor[6]."</td></tr></div>";
                $band = 1;
            }
        
        }

        foreach($ins as $reg => $valor)
        {

            if(isset($valor[2]) && $valor[3] == $param)
            {   
               echo "<tr><td align = 'middle'>".$valor[0]."</td>
                      <td align = 'middle' >".$valor[1]."</td>
                      <td align = 'middle'>".$valor[2]."</td>
                      <td align = 'middle'>".$valor[3]."</td>
                      <td align = 'middle'>".$valor[4]."</td>
                      <td align = 'middle'>".$valor[6]."</td></tr></div>";
                $band = 1;
            }
        
        }
        if($band != 1)
        {
            echo "<td colspan = '6' align = 'middle'> NO SE ENCUENTRA REGISTRO CON ESE APELLIDO</td>";
        }

    }

    function alumnos()
    {
        $ins = leerArchivo("./Clases/Registros/Alumnos.txt");
        $ruta;
            echo "  <div align= 'center'> <table border='2' bordercolor ='green'>
                    <th colspan='4'>ALUMNOS</th>
                    <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>EMAIL</th>
                    <th>FOTO</th>
                    <tbody>
                        ";
        foreach($ins as $campo => $valor)

            if(isset($valor[0]) && isset($valor[1]) && isset($valor[2]) && isset($valor[3]) )
            {
                $ruta = "./Clases/Registros/Fotos/". $valor[3];
                echo "<tr><td align = 'middle'>".$valor[0]."</td>
                      <td align = 'middle' >".$valor[1]."</td>
                      <td align = 'middle'>".$valor[2]."</td>
                      <td><img src='" . $ruta . "' width = '80px' heigth = '80px'></td>";
                echo"</tr></div>";
            }
   
    }

    function modificarAlumno($nombre, $apellido, $email, $foto)
    {
        $archivo= leerArchivo("./Clases/Registros/Alumnos.txt");
        $array = array(); $N_alumno; $band;

        foreach($archivo as $alumno =>$valor)
        {
            if(isset($valor[2]) && $valor[2] == $email)
            {
                $N_alumno = new Alumno($nombre, $apellido, $valor[2], $foto);
                $ext = explode("/", $foto['foto']['type']);
                $rename = $apellido ."-". date("m.d.y")."." . $ext[1];
                if(copy("./Clases/Registros/Fotos/". rtrim($valor[3], PHP_EOL), "./Clases/Registros/backupFotos/".$rename))
                {
                    guardarFoto("./Clases/Registros/Fotos/", $foto, $valor[3]);
                }
                
            }
            if(isset($valor[2]) && $valor[2] != $email)
            {
                $array[] = $valor;
            }
        }

        $archivo = fopen("./Clases/Registros/Alumnos.txt", "w+");
        
        foreach($array as $alumno => $valor)
        {
            if(isset($valor[0]) )
            {
                $str= $valor[0] . "*" . $valor[1] . "*" . $valor[2] . "*" . $valor[3];
                if(fwrite($archivo, $str))
                    $band= 1;
            }
        }
        if($band == 1)
            if(escribirArchivo("./Clases/Registros/Alumnos.txt", $N_alumno))
                
                echo strtoupper("se ha modificado correctamente el alumno");
        else
            echo strtoupper("ha ocurrido un error");
    }
?>