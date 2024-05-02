<?php // alt shift A

    /** Programa Piramide */
    // Forma una piradamide de numeros naturales
    // int $numero, $i, $j 

    echo "Ingrese un numero: " ; 
    $numero = trim(fgets(STDIN)) ; 

        for($i = 1 ; $i <= $numero ; $i++) {                           
            for($j = $numero ; $j >= $i ; $j--) {   
                echo $j ;                               
            }
            echo "\n" ;
        } 

        // n = 3
        // 3 2 1 
        // 3 2 
        // 3