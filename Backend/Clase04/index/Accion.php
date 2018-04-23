<?php
    echo "<a href='index.php'>Volver</a><br><br>";
    require_once("../Persona.php");
    

    switch ($_POST['btnValue'])
     {
        case "Cargar":
                {
                    $pers = new Persona($_POST['Nombre'],$_POST['Apellido'],$_POST['Edad'],$_POST['Legajo']);
                    $pers->__Cargar();
                    break;
                }
        
        case "Borrar":
                {
                    break;
                }
            
        
        case "Modificar":
            echo("Modifico");
        break;
    }
?>