<?php

    /**
     * Ordena el número de forma inversa
     * @param int $nroInicial
     * @return int
     */

    function ordenInverso($nroInicial) {
        //int $cifra, $nroReves
         
        $cifra = 0;
        $nroReves = 0;
            do {
                $cifra = $nroInicial % 10;
                $nroInicial = $nroInicial / 10;
                $nroReves = $nroReves * 10 + $cifra;
            } while ($nroInicial >= 1);
        return $nroReves; 
    } 


    echo "Ingrese un numero a invertir: " ; 
    $numero = trim(fgets(STDIN)) ; 
        $numReves = ordenInverso($numero) ; 
    echo $numReves ; 