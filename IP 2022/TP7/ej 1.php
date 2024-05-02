<?php 

    /**
     * Almacena temperaturas
     * @param int $numTemp
     * @return array 
     */

    function leerTemperaturas($numTemp) {
        // array $temperaturas 
        // int $i 

        for($i = 0 ; $i < $numTemp ; $i++) {
            echo "Ingrese temperatura: " ; 
            $temperaturas [$i] = trim(fgets(STDIN)) ;
        }
        return $temperaturas ; 
    }

    /**
     * Muestra las temperaturas por pantalla 
     * @param array $temperaturas
     * @return string
     */

    function listarTemperaturas($temperaturas) {
        // int $temp

        for($i=0 ; $i<count($temperaturas) ; $i++) {
            $temp = $temperaturas[$i] ; 
            echo $temp . "\n" ; 
        }
        return $temp ; 
    }

    /**
     * Calcula el porcentaje de las temperaturas
     * @param array $temperaturas 
     * @return float 
     */

    function promTemperaturas($temperaturas) {
        // float $promedio, $sumaTemp, $j 
        // int $cantTemp, $i

        $cantTemp = 0 ; 
        $sumaTemp = 0 ; 

        for($i = 0 ; $i < count($temperaturas) ; $i++) {
            $j = $temperaturas[$i] ; 
            $cantTemp = $cantTemp + 1 ; 
            $sumaTemp = $sumaTemp + $j ; 
        } 
        $promedio = $sumaTemp / $cantTemp ; 
        return $promedio ; 
    }

    /**
     * Calcula el porcentaje de las temperaturas mayores a la determinada
     * @param array $temperaturas
     * @param float $tempDeterminada
     * @return float 
     */

    function porcTemperaturasSuperiores($temperaturas, $tempDeterminada) {  
        // float $porcentaje, $j 
        // int $cantSuperior, $cantTemp, $i 

        $cantSuperior = 0 ; 
        $cantTemp = 0 ; 

        for($i=0 ; $i<count($temperaturas) ; $i++) {
            $j = $temperaturas[$i] ; 
            $cantTemp = $cantTemp + 1 ; 
                if($j > $tempDeterminada) {
                    $cantSuperior = $cantSuperior + 1 ; 
                }
        }
        $porcentaje = (($cantSuperior * 100) / $cantTemp) ;
        return $porcentaje ; 
    }

    /**
     * Retorna el indice donde se encuentra la menor temperatura
     * @param array $temperaturas 
     * @return int 
     */
     
    function minTemperatura($temperaturas) {  
        // int $indice, $i
        // float $menorTemp, $recorre 

        $menorTemp = 99999 ; 
        $indiceMen = 0 ;

        for($i=0 ; $i<count($temperaturas) ; $i++) {
            $recorre = $temperaturas[$i] ; 
                if($recorre < $menorTemp) {
                    $menorTemp = $recorre ; 
                    $indiceMen = $i ; 
                }
        }
        return $indiceMen ; 
    }

    /**
     * Retorna el indice donde se encuentra la mayor temperatura
     * @param array $temperaturas
     * @return int 
     */

    function maxTemperatura($temperaturas) {
        // int $indice, $i 
        // float $mayorTemp, $recorre 

        $mayorTemp = -1 ; 
        $indiceMay = 0 ; 

        for($i=0 ; $i<count($temperaturas); $i++) {
            $recorre = $temperaturas[$i] ; 
                if($recorre > $mayorTemp) {
                    $mayorTemp = $recorre ; 
                    $indiceMay = $i ; 
                }
        }
        return $indiceMay ; 
    }

    /**
     * Retorna arreglo asociativo
     * @param array $temperaturas
     * @return array 
     */

    function extremosTemperatura($temperaturas) {
        // array $temperaturasMaxMin

        $mayorTemp = -1 ; 
        $menorTemp = 9999 ; 

        for($i=0 ; $i<count($temperaturas); $i++) {
            $recorre = $temperaturas[$i] ; 
                if($recorre > $mayorTemp) {
                    $mayorTemp = $recorre ; 
                }
                if($recorre < $menorTemp) {
                    $menorTemp = $recorre ; 
                }
        }
        $temperaturasMaxMin = ["max" => $mayorTemp, "min" => $menorTemp] ;
        return $temperaturasMaxMin ; 
    }


    /* Programa Principal */
    // Muestra los resultados 
    // int $nTemp, $indiMen, $indiMay
    // float $tempDetermi, $prom, $porcen
    // string $tempera
    // array $temp, $tempMayMen

    echo "Ingrese numero de temperaturas: " ;  
    $nTemp = trim(fgets(STDIN)) ; 
    echo "Ingrese temperatura determinada: " ;
    $tempDetermi = trim(fgets(STDIN)) ; 
    $temp = leerTemperaturas($nTemp) ; 
    print_r($temp) . "\n" ; 
    listarTemperaturas($temp) ; 
    $prom = promTemperaturas($temp) ; 
    echo "El promedio de las temperaturas es: " . $prom . "\n" ; 
    $porcen = porcTemperaturasSuperiores($temp, $tempDetermi) ; 
    echo "El porcentaje de las temperaturas superiores es: " . $porcen . "\n" ; 
    $indiMen = minTemperatura($temp) ; 
    echo "El indice de la menor temperatura es: " . $indiMen . "\n" ; 
    $indiMay = maxTemperatura($temp) ; 
    echo "El indice de la mayor temperatura es: " . $indiMay . "\n" ; 
    $tempMayMen = extremosTemperatura($temp) ; 
    echo $tempMayMen["max"] . "\n" ; 
    echo $tempMayMen["min"] ; 