<?php

    function obtenerNombreFoto($nombre, $foto)
    {
        $ext = array_reverse(explode("/", $foto['foto']['type']));
            $foto['foto']['name'] = $nombre . "." . $ext[0];
            return $foto['foto']['name'];
    }

    function guardarFoto( $ruta, $foto, $nombre)
    {
        if(move_uploaded_file($foto['foto']['tmp_name'], $ruta . $nombre))
            return true;
        else 
            return false;
    }
?>