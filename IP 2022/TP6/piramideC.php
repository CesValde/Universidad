<?php // alt shift A

    /** Programa Piramide */
    // Forma una piradamide de numeros naturales
    // int $numero, $i, $j 

    
    echo "Ingrese un numero: " ; 
    $numero = trim(fgets(STDIN)) ; 

        for($i = 1 ; $i <= $numero ; $i++) { 
            for($j = $i ; $j <= $numero ; $j++) {   
                echo $i ;                     
            }             
            echo "\n" ;        
        } 
        
        // n = 3
        // 1 1 1
        // 2 2
        // 3 