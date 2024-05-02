<?php 

    /**
     * Transforma las horas y minutos a segundos
     * @param int $horas
     * @param int $minutos
     * @param int $segundos 
     * @return int
     */

    function aSegundos($horas, $minutos, $segundos) {
        // int $horasSeg, $minSeg, $seg, $segu

        $horasSeg = ($horas * 3600) ; 
        $minSeg = ($minutos * 60) ; 
        $segu = $horasSeg + $minSeg + $segundos; 
        return $segu;
    }

    /**
     * Calcula la velocidad del 1er puesto
     * @param int $metros
     * @param int $horas 
     * @param int $minutos
     * @param int $segundos
     * @return float
     */

    function velocidadPrimer($metros, $horas, $minutos, $segundos) {
        // int $segu1, float $velociPrimero

        $segu1 = aSegundos($horas, $minutos, $segundos) ; 
        $velociPrimero = $metros / $segu1 ; 
        return $velociPrimero ; 
    }

    /**
     * Calcula la velocidad del 2do puesto
     * @param int $metros
     * @param int $horas 
     * @param int $minutos
     * @param int $segundos
     * @return float
     */

    function velocidadSegundo($metros, $horas, $minutos, $segundos) {
        // int $segu2 float $velociSegundo

        $segu2 = aSegundos($horas, $minutos, $segundos) ; 
        $velociSegundo = $metros / $segu2 ; 
        return $velociSegundo ; 
    }

    /** Programa carrera */
    // Muestra la llegada en m/seg del primer y segundo puesto
    // int $mtrs, $hor1, $min1, $seg1, $hor2, $min2, $seg2, $llegadaPrimero, $llegadaSegundo

    echo "Ingrese metros recorridos: " ; 
    $mtrs = trim(fgets(STDIN)) ; 
    echo "Ingrese horas del 1er puesto: " ; 
    $hor1 = trim(fgets(STDIN)) ; 
    echo "Ingrese minutos del 1er puesto: " ; 
    $min1 = trim(fgets(STDIN)) ; 
    echo "Ingrese segundos del 1er puesto: " ; 
    $seg1 = trim(fgets(STDIN)) ; 
    echo "Ingrese horas del 2do puesto: " ;
    $hor2 = trim(fgets(STDIN)) ; 
    echo "Ingrese minutos del 2do puesto: " ; 
    $min2 = trim(fgets(STDIN)) ; 
    echo "Ingrese segundos del 2do puesto: " ; 
    $seg2 = trim(fgets(STDIN)) ; 
    $llegadaPrimero = velocidadPrimer($mtrs, $hor1, $min1, $seg1) ; 
    $llegadaSegundo = velocidadSegundo($mtrs, $hor2, $min2, $seg2) ; 
    echo "La velocidad del primer ciclista es de: " . $llegadaPrimero . "\n" . 
    "la velocidad del segundo ciclista es de: " . $llegadaSegundo ; 