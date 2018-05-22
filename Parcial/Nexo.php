<?php

require_once ("./Clases/Funciones.php");
$op = $_REQUEST['op'];

switch($op)
{
    case 'cargarAlumno':
    {
        cargarAlumno($_POST['nombre'], $_POST['apellido'], $_POST['email'],$_FILES);
        break;
    }

    case 'consultarAlumno':
    {
        consultarAlumno($_GET['apellido']);
        break;
    }

    case 'cargarMateria':
    {
        cargarMateria($_POST['nombre_materia'],$_POST['codigo_materia'], $_POST['cupo'],$_POST['aula']);
        break;
    }

    case 'inscribirAlumno':
    {
        inscribirAlumno($_GET['nombre'],$_GET['apellido'],$_GET['email'], $_GET['materia'], $_GET['codigo']);
        break;
    }

    case 'inscripciones':
    {
        inscripciones($_GET['filtro']);
        break;
    }

    case 'alumnos':
    {
        alumnos();
        break;
    }

    case 'modificarAlumno':
        {
            modificarAlumno($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_FILES);
            break;
        }
}

?>  