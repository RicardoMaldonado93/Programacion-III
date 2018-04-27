<?php
    require_once("./clases/IVendible.php");
    
    class Helado implements Ivendible
    {
        private $sabor;
        private $precio;
        private $foto;

        public function __construct($sabor, $precio, $foto)
        {
            $this->sabor = strtolower($sabor);
            $this->precio = strtolower($precio);
            $this->foto = $foto;
        }

        public function __GET($atrib)
        {
            if(is_array($atrib))
                return $atrib['imagen']['name'];
            else
                return $this->$atrib;
        }

        public function Archivo($foto)
        {
            $ext = array_reverse(explode("/", $foto['imagen']['type']));
            $foto['imagen']['name'] = $this->__GET("sabor") . "." . date("His"). "." . $ext[0];
            return $foto['imagen']['name'];

        }

        public function __toString()
        {
            $msg = $this->__GET("sabor") . "*" . $this->__GET("precio") . "*" . $this->Archivo($this->__GET("foto")) . PHP_EOL;

            return $msg;
        }

        public function PrecioMasiva()
        {
            return $this->__GET("precio") * 1.21;
        }

        public static function Lista()
        {
            $archivo = fopen("./helados/sabores.txt", "r");
            $helados = array();
    
            if($archivo != false)
                while(!feof($archivo))
                    $helados[]= explode("*",fgets($archivo));

            return $helados;
        }

    }
?>