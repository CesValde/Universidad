<?php 

    /** Programa Factorial */
    // Calcula el factorial de un numero
    // int $n, $acum, $i 

        $acum = 1 ; 

    echo "Ingrese un numero para obtener su factorial: " ; 
    $n = trim(fgets(STDIN)) ; 
        for($i = 1 ; $i <= $n ; $i++) {
            $acum = $acum * $i ;            
        }

    echo "El factorial de " . $n . " es: " . $acum ; 