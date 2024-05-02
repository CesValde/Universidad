<?php

    /** Programa Piramide */
    // Forma una piradamide de numeros naturales
    // int $numero, $i, $j 

    echo "Ingrese un numero: " ; 
    $numero = trim(fgets(STDIN)) ; 

        for($i = 1 ; $i <= $numero ; $i++) {                
            for($j = 1 ; $j <= $i ; $j++) {   
                echo $j ;                               
            }
            echo "\n" ;
        } 

        // n = 3
        // 1 
        // 1 2
        // 1 2 3 