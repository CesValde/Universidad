<?php // alt shift A

    /** Programa Piramide */
    // Forma una piradamide de numeros naturales
    // int $numero, $i, $j 

    
    echo "Ingrese un numero: " ; 
    $numero = trim(fgets(STDIN)) ; 

    $aux = $numero ; 

        for($i = 0 ; $i < $numero ; $i++) {  
           for($j = $numero ; $j > $i ; $j--) {   
                echo $aux ;                     
            }
            $aux = $aux - 1 ;
            echo "\n" ;        
        } 
        
        // n = 3
        // 3 3 3 
        // 2 2
        // 1 