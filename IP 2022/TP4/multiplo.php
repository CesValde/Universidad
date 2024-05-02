<?php

    /** 
     * Calcula si un numero es multiplo de 2 
     * @param int $numero
     * @return boolean 
     */
   
    function esMultiplo($numero) {
        // int $resultado

        $resultado = $numero % 2 == 0 ; 
        return $resultado ; 
    }

    /** Programa Multiplo */
    // Muestra por pantalla si un numero es multiplo de 2
    // int $num, string $cartel, boolean $result 

    echo "Ingrese un numero: " ; 
    $num = trim(fgets(STDIN)) ; 
    $result = esMultiplo($num) ;
    $cartel = $result ? $num . " es multiplo de 2 " : $num . " no es multiplo de 2" ; 
    echo $cartel ; 