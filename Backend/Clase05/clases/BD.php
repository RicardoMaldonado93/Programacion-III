<?php
        $cons= 'mysql:host=localhost;dbname=cdcol;charset=utf8';
        $user="root";
        $pass="";
        $pdo = new PDO($cons, $user, $pass);
        
        $query2 = $pdo->query("select * from persona");
        $ms = $_POST['nombre']. ',' . $_POST['apellido']. ',' .$_POST['legajo']. ',' .$_POST['edad'];
        $sql= "insert into persona(Nombre,Apellido,Legajo,Edad) values ('". $ms ."')";

        $query = $pdo->query($sql);
        while($file = $query2->fetch(PDO::FETCH_ASSOC))
            var_dump($file);

        //>BINvalue
        //execute
?>
