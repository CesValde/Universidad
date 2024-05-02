<?php 

    /**
     * Calcula si el primer numero es multiplo del segundo
     * @param int $numero1
     * @param int $numero2
     * @return boolean
     */

    function esMultiplo($numero1, $numero2) {
        // boolean $resultado

        $resultado = $numero1 % $numero2 == 0 ; 
        return $resultado ; 
    }

    /** Programa Multiplo */
    // Muestra por pantalla si el primer numero es multiplo del segundo
    // int $num1, $num2, string $cartel Boolean $result

    echo "Ingrese el primer numero: " ;
    $num1 = trim(fgets(STDIN)) ; 
    echo "Ingrese el segundo numero: " ; 
    $num2 = trim(fgets(STDIN)) ; 
    $result = esMultiplo($num1, $num2) ; 
    $cartel = $result ? $num1 . " es multiplo de " . $num2  : $num1 . " no es multiplo de " . $num2 ; 
    echo $cartel ; 