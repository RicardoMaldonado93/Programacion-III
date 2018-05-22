<?php

    function leerArchivo($ruta)
    {
        $archivo = fopen($ruta, "r");

        while(!feof($archivo))
            $registros[] = explode("*",fgets($archivo));

        fclose($archivo);

        return $registros;
    }

    function escribirArchivo($ruta, $objeto)
    {
        $archivo = fopen($ruta, "a+");

        if(fwrite($archivo, $objeto) != false )
        {
            fclose($archivo);
            return true;
        }
        else
        {
            fclose($archivo);
            return false;
        }
    }

?>