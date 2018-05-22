<?php
class Materia
{
    private $nombre;
    private $codigo;
    private $cupo_alumnos;
    private $aula;

    function __construct($nombre, $codigo, $cupo, $aula)
    {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->cupo_alumnos = $cupo;
        $this->aula = $aula;
    }

    function __GET($atrib)
    {
        return $this->$atrib;
    }

    function __toString()
    {
        $msg = $this->__GET('nombre') . "*" . $this->__GET('codigo') . "*" . $this->__GET('cupo_alumnos') . "*" . $this->__GET('aula');
        return $msg; 
    }
}
?>