<?php 

    $numA = 1 ; 
    $numB = 0 ; 

    echo "Ingrese un numero para imprimir dicha cantidad de términos: " ; 
    $n = trim(fgets(STDIN)) ; 

        for($i = 0 ; $i < $n ; $i++) {
            echo $numA . " " . "\n" ; 
            $numA = $numA + $numB ; 
            $numB = $numA - $numB ; 
        } 