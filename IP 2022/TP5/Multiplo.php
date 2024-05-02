<?php

    /**
     * Calcula si A es multiplo de B
     * @param int $numeroA
     * @param int $numeroB
     * @return int
     */

    function multiplos($numeroA, $numeroB) {
        // boolean $resultado
        if($numeroA % $numeroB == 0) {
            $resultado = true ; 
        } else {
            $resultado = false ; 
        }
        return $resultado ; 
    }

    /** Programa Multiplo */
    // Muestra si A es multiplo de B 
    // int $numA, $numB boolean $result 

    echo "Ingrese numeroA: " ; 
    $numA = trim(fgets(STDIN)) ; 
    echo "Ingrese numeroB: " ; 
    $numB = trim(fgets(STDIN)) ; 
    $result = multiplos($numA, $numB) ; 
        if($result) {
            echo $numA . " es multiplo de " . $numB ; 
        } else {
            echo $numA . " no es multiplo de " . $numB ; 
        }