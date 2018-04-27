<?php
    class Cliente
    {
        private $nombre;
        private $correo;
        private $clave;

        public function __construct ($nom, $correo, $clave)
        {
            $this->nombre = strtolower($nom);
            $this->correo = $correo;
            $this->clave = $clave;
        }
         
        public function __GET($atrib){ return $this->$atrib; }

        function __toString()
        {
            $msg = $this->__GET("nombre") . "*" . $this->__GET("correo") . "*" . $this->__GET("clave") . PHP_EOL;

            return $msg;
        }

    }
?>