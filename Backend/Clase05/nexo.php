<?php
    echo "<a href='index.php'>Volver</a><br><br>";
    require_once("./clases/Persona.php");
    require_once("./clases/BD.php");

    switch ($_POST['accion'])
     {
        case "Cargar":
                {
                    $pers = new Persona($_POST['Nombre'],$_POST['Apellido'],$_POST['Edad'],$_POST['Legajo'], $_FILES);
                    $pers->__Cargar();
                    break;
                }
        
        case "Borrar":
                {
                    Persona::__Borrar($_POST['Legajo']);
                    break;
                }
            
        
        case "Modificar":
                Persona::Modificar($_POST['Legajo'],$_POST['Nombre'],$_POST['Apellido'],$_POST['Edad'], $_FILES);

        case "BD":
                {
                    BD::_mostrar();
                    break;
                }
    }
?>