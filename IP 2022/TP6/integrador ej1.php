<?php

    /**
     * Calcula el tipo de llamada 
     * @param int $codInternacional
     * @param int $codNacional
     * @return string 
     */

    function calcTipoLlamada($codInternacional, $codNacional) {
        // string $tipoLlamada 

        $tipoLlamada = "internacional" ; 

        if($codInternacional == "54") {
            $tipoLlamada = "nacional" ; 
                if($codNacional == "299") {
                    $tipoLlamada = "corta" ; 
                } else {
                    $tipoLlamada = "larga" ; 
                }
        }
        return $tipoLlamada ; 
    }

    /**
     * Calcula el costo de la llamada 
     * @param string $tipoLlamada 
     * @return float 
     */

    function calcCostoLlamada($tipoLlamada) {
        // float $costoSeg 

        if($tipoLlamada == "internacional") {
            $costoSeg = 2 ;
        } elseif($tipoLlamada == "larga") {
            $costoSeg = 0.75 ; 
        } else {
            $costoSeg = 0.2 ;
        }
        return $costoSeg ; 
    }

    /* Programa Llamada */
    // Muestra el tipo de cada llamada, el coste total y la cantidad de llamadas de larga distancia
    // int $cantLlamadas, $i, $codInter, $codNacio, $seg, $cantLlamadasLargas
    // float $costoTotal, $costoSe, $acum 
    // string $tipLlamada

    $costoTotal = 0 ; 
    $cantLlamadasLargas = 0 ; 

    echo "Ingrese cantidad de llamadas a realizar: " ; 
    $cantLlamadas = trim(fgets(STDIN)) ; 
    
        for($i = 1 ; $i <= $cantLlamadas ; $i++) {
            echo "Ingrese nro de codigo internacional: " ; 
            $codInter = trim(fgets(STDIN)) ; 
            echo "Ingrese nro de codigo nacional: " ; 
            $codNacio = trim(fgets(STDIN)) ; 
            echo "Ingrese segundos de la llamada: " ; 
            $seg = trim(fgets(STDIN)) ; 
                $tipLlamada = calcTipoLlamada($codInter, $codNacio) ; 
                $costoSe = calcCostoLlamada($tipLlamada) ; 
            $acum = $seg * $costoSe ; 
            $costoTotal = $costoTotal + $acum ; 
            echo "Llamada nro " . $i . " es " . $tipLlamada . "\n" ; 
                if($tipLlamada == "larga") {
                    $cantLlamadasLargas = $cantLlamadasLargas + 1 ;
                }
        }
    echo "El costo total es: " . $costoTotal . "\n" ; 
    echo "Cantidad de llamadas de larga distancia: " . $cantLlamadasLargas ; 