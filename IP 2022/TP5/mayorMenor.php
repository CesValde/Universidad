<?php

    /**
     * Calcula si el primer numero es mayor al segundo
     * @param int $numero1
     * @param int $numero2 
     * @return boolean
     */

    function mayor($numero1, $numero2) {
        if($numero1 > $numero2) {
            $resultado = true ;
            echo $numero1 . " es mayor que " . $numero2 ; 
        } else {
            $resultado = false ; 
            echo $numero1 . " no es mayor que " . $numero2 ; 
        }
        return $resultado ; 
    }

    /** Programa MayorMenor */
    // Muestra si el primer numero es mayor al segundo
    // int $num1, $num2 Boolean $result 

    echo "Ingrese el primer numero: " ; 
    $num1 = trim(fgets(STDIN)) ;
    echo "Ingrese el segundo numero: " ; 
    $num2 = trim(fgets(STDIN)) ; 
    $result = mayor($num1, $num2) ; 
    echo $result ; 