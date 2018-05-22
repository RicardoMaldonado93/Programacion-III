<?php

require_once ("./Clases/Foto.php");

class Alumno
{
    private $nombre;
    private $apellido;
    private $email;
    private $foto;

    function __construct($nombre, $apellido, $email, $foto)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->foto = obtenerNombreFoto($email, $foto);
    }

    public function __GET($atrib)
        {
            if(is_array($atrib))
            return $atrib['foto']['name'];
        else
            return $this->$atrib;
        }


    function __toString()
    {
        $msg = $this->__GET('nombre') . "*" . $this->__GET('apellido') . "*" . $this->__GET('email') . "*"  . $this->__GET('foto') . PHP_EOL;
        return $msg;
    }

}
?>