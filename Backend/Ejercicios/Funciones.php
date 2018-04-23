<?php
    $arrayp = array();

    function __invertir($var)
    {
        
        if(strlen($var != NULL))
             for($i=0; $i<=strlen($var); $i++)
                 $arrayp[$i] = substr($var,strlen($var)-$i,1);
        
        foreach ($arrayp as $key => $value) 
            echo $value;
    }
?>