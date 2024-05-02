<?php // con while

    /** 
     * Calcula si un número es primo
     * @param int $numero 
     * @return int $primo
     */

    function calcPrimo($numero) {           
        // int $primo
            
        $i = 2 ;
        $primo = true ;

            while(($i < $numero) && $primo) {
                if($numero % $i == 0) {
                    $primo = false ; 
                } 
                $i++ ; 
            }
            if($numero == 1) {
                $primo = false ; 
            }
        return $primo ; 
    }

    /** Programa Primo */
    // Muestra si un numero es primo
    // int $num
    // boolean $prim

    echo "Ingrese un numero: " ; 
    $num = trim(fgets(STDIN)) ;
        $prim = calcPrimo($num) ; 

        if($prim) {
            echo "es primo" ; 
        } else {
            echo "no es primo" ; 
        } 