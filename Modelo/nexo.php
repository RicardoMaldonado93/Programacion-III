<?php
        require_once("./clases/Funciones.php");
        $ope; $band = 0;

        if(isset($_GET))
        {
            $ope = $_GET['op'];
            $band = 1;
        }
        else
            $ope = $_POST['op'];


    switch($ope)
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
                if($band == 1)
                    borrarHelados($_GET['sabor']);
                else
                    borrarHelados($_POST['caso']);
                break;
            }
        default:
            {
                echo "ERROR!!! VERIFIQUE INSTRUCCION";
                break;
            }
    }
?>