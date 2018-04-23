<?php
    $nombre = $_POST['nombre'];
    $arch = $_FILES;
    $archAux = array();
    $ext = explode('.', $_FILES['archivo']['name']);
    $ext = array_reverse($ext);
    $archAux = $_FILES;

    if($archAux['archivo']['name'] != '')
            $archAux['archivo']['name'] = $nombre . '.' . $ext[0];           
    
    if(move_uploaded_file($arch['archivo']['tmp_name'],"./Upload/". $archAux['archivo']['name']))
        echo "Se movio correctamente";

?>