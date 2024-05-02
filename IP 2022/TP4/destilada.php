<?php 

    /**
     * Calcula la cantidad de agua destilada
     * @param float $cantLoratadina
     * @param float $cantBetametasona
     * @return float 
     */

    function calcAguaDestilada($cantLoratadina, $cantBetametasona) {
        // float $aguaDestilada

        $aguaDestilada = (($cantLoratadina * 10) / 100) + (($cantBetametasona * 15) / 100) ; 
        return $aguaDestilada ; 
    }

    /** Programa Destilada */
    // Muestra por pantalla la cantidad de agua destilada
    // float $cantLorata, $cantBetameta, $aguaDesti 

    echo "Ingrese cantidad de loratadina: " ; 
    $cantLorata = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de betametasona: " ; 
    $cantBetameta = trim(fgets(STDIN)) ; 
    $aguaDesti = calcAguaDestilada($cantLorata, $cantBetameta) ; 
    echo "La cantidad de agua destilada es de: " . $aguaDesti ;