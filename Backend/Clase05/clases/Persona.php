<?php

    class Persona
    {
        private $nombre;
        private $apellido;
        private $edad;
        private $legajo;
        private $imagen;

        function __construct($nombre, $apellido, $edad, $legajo, $imagen)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
            $this->legajo = $legajo;
            $this->imagen = $imagen; 
        }

        public function __get($param){ return $this->$param; }
        public function __set($param , $value) { $this->$param = $value; }

        function __toString()
        {
            $msg = $this->__get("nombre")."*".$this->__get("apellido")."*".$this->__get("edad")."*".$this->__get("legajo").'*'. $this->__archivo().'*';
            return $msg;
        }

        private function __archivo()
        {
            $arch = $_FILES;
            $ext = array_reverse(explode('/', $_FILES['imagen']['type']));
            $arch['imagen']['name'] = $this->legajo . "." . $ext[0];

            return $arch['imagen']['name'];
        }

        public function __grabar($list)
        {
            $var = fopen("./BD.txt","r");
            $lista= array();
            $listaaux = array();

            while(!feof($var))
                $lista[] = explode('*',fgets($var));

            return $lista;
        }

        public function __Cargar()
        {
            //esta funcion abre y carga en BD un registro y si la operacion es exitosa,
            //crea una imagen con el legajo del registro.

            $var = fopen("./BD.txt","a+");
            $arch = $this->__archivo();
            $ext = array_reverse(explode('/', $_FILES['imagen']['type']));
            
            fwrite($var, $this->__toString(). PHP_EOL);
            fclose($var);
            if($_FILES['imagen']['size'] <= 10000000)
                if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/".$arch))
                    echo'***************SE CARGO EL REGISTRO: ' . strtoupper($this->nombre) ." ". strtoupper($this->apellido) . '***************';
        }

        public static function __Borrar($leg)
        {
            $var = fopen("./BD.txt",'r');
            $lista= array();
            $listaaux = array();
            $ext;

            while(!feof($var))
                $lista[] = explode('*',fgets($var));

            foreach($lista as $indice=> $valor)
                if(isset($valor[3]) && $valor[3] == $leg )
                    $ext = $valor[4];
                
            foreach($lista as $indice=> $valor)
                if(isset($valor[3]) && $valor[3] != $leg ) 
                    $listaaux[] = $valor;
                    
            $var = fclose("./BD.txt");
            $var = fopen("./BD.txt",'w+');

            foreach($listaaux as $indice=> $valor)
                fwrite($var, $valor[0].'*'.$valor[1].'*'.$valor[2].'*'.$valor[3].'*'.$valor[4]. PHP_EOL);
           
            $ext = array_reverse(explode('.', $ext));
            $msg = $ext[1] . '.' . trim($ext[0],"");
            if (unlink("../img/". $msg ) == false)
                echo '**NO SE HA ENCONTRADO ARCHIVO ' . $leg . '.'.$ext[0]."**";
            fclose($var);

            echo '<br>===================SE BORRO EL REGISTRO:'.$leg.'==================<br>';
            
        }

        public static function Modificar($leg, $nom, $ape, $ed, $img)
        {
            $var = fopen("./BD.txt","r");
            $lista= array();
            $listaAux = array();

            while(!feof($var))
                $lista[] = explode('*',fgets($var));

            $listaAux[] = $lista;

            var_dump($listaAux);
            foreach($lista as $indice=>$valor)
                if(isset($valor[3]) && $valor[3] == $leg )
                {
                    $ind = key($valor);
                    $valor[0] = $nom;
                    $valor[1] = $ape;
                    $valor[2] = $ed; 
                    $valor[4] = $img['imagen']['name'];
                }
            
            $var = fopen("./BD.txt.php",'w+');
            move_uploaded_file("./BD.txt","./BD-2.txt");

            foreach($listaAux as $indice=> $valor)
                foreach($valor as $key => $value)
                    fwrite($var, $value[0].'*'.$value[1].'*'.$value[2].'*'.$value[3].'*'.$value[4]. PHP_EOL);

            echo 'se ha modificado el archivo';
        }
    }
?>
