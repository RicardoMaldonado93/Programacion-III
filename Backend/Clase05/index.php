<?php
    var_dump($_POST);

    if(isset($_POST['accion'])== true )
        echo "<form method= 'post' action='./clase/archivo.php'></form>";
?>