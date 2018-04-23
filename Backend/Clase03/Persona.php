<?php

    class Persona
    {
        private $nombre;
        private $apellido;
        private $edad;
        private $legajo;

        function __construct($nombre, $apellido, $edad, $legajo)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
            $this->legajo = $legajo;
        }

        public function __get($param){ return $this->$param; }
        public function __set($param , $value) { $this->$param = $value; }

        function __toString()
        {
            $msg = $this->__get("nombre")."*".$this->__get("apellido")."*".$this->__get("edad")."*".$this->__get("legajo");
            return $msg;
        }

        function __Cargar()
        {
            $var = fopen("../BD.php","a");
            fwrite($var, $this->__toString(). PHP_EOL);
            fclose($var);
            echo'SE CARGO';
        }

        function __Borrar()
    }
?>