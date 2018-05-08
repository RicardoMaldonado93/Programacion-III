<?php
    
    require_once("./clases/Funciones.php");

    if(isset($_POST['op']))
    {
        switch($_POST['op'])
        {
            case 'cargarCliente':
                {
                    cargarCliente($_POST['nombre'],$_POST['correo'],$_POST['pass']);
                    break;
                }

            case 'validar':
                {
                    echo validar($_POST['correo'],$_POST['pass']);
                    break;
                }

            case 'cargarHelado':
                {
                    cargarHelado($_POST['sabor'],$_POST['precio'],$_FILES);
                    break;
                }

            case 'borrarHelado':
                {
                    $sabor = borrarHelados($_POST['sabor'], 1);
                    setcookie('helado',$sabor);
                    break;
                }
            case 'modificarHelado':
                    {
                        if(modificarHelado($_POST['sabor'],$_POST['precio'],$_FILES))
                            echo "SE HA MODIFICADO EL HELADO DE " . $_POST['sabor'];
                    }
            default:
                {
                    echo "ERROR!!! VERIFIQUE INSTRUCCION";
                    break;
                }
        }
    }
    elseif(isset($_GET['op']))
    {
        switch($_GET['op'])
        {
            case 'vender':
                {
                    echo vender($_GET['sabor'],$_GET['cant']);
                    break;
                }

            case 'listadoHelados':
                {
                    ListadoHelados();
                    break;
                }
            
            case 'borrarHelado':
                {
                    if(borrarHelados($_GET['op'], $_COOKIE['helado']))
                    echo "SE HA BORRADO CON EXITO EL SABOR **" . strtoupper($_COOKIE['helado']) ."**<br>";
                    break;
                }
        }
    }


?>