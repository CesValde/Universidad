<?php 

    /**
     * Convierte horas minutos y segundos a segundos 
     * @param int $horas 
     * @param int $minutos 
     * @param int $segundos
     * @param string $formato
     * @return int 
     */

    function aSegundos($horas, $minutos, $segundos, $formato) {
        // int $segundosTotales,  
        
            if($formato == "PM") {
                $horas = $horas + 12 ; 
            } else {
                $horas = $horas ; 
            }
            if($formato == "AM") {
                if($horas == 12) {
                    $horas = $horas - 12 ; 
                }
            }

        $horas = 3600 * $horas ; 
        $minutos = 60 * $minutos ; 
        $segundosTotales = $horas + $minutos + $segundos ;

        return $segundosTotales ;  
    }

    /** 
     * Convierte los segundos en un formato de hora 
     * @param int $segundos
     * @return string 
     */

    function formatoHora($segundos) {
        // string $formatoHora 

        $horas = (int) ($segundos/3600) ;
        $minutos = (int) ((($segundos/3600)-$horas)*60) ;
        $segundos = (int) (((($segundos/3600)-$horas)*60-$minutos)*60) ;
        $formatoHora = $horas . "h:" . $minutos . "m:" . $segundos . "s" ; 

        return $formatoHora ; 
    }

    /**
     * Calcula si la primera hora es menor que la segunda 
     * @param int $hora1
     * @param int $hora2 
     * @return boolean 
     */

    function esMenor($hora1, $hora2) {      // horas expresadas en segundos
        // boolean $hora

            if($hora1 < $hora2) {
                $hora = true ;
            } else {
                $hora = false ; 
            }
            return $hora ; 
    }

    /**
     * Calcula en segundos la diferencia entre dos horas 
     * @param int $hora1 
     * @param int $hora2
     * @return string 
     */

    function difHoras($hora1, $hora2) {
        // string $diferencia, int $difeSeg

            if($hora1 > $hora2) {
                $difeSeg = $hora1 - $hora2 ; 
            } else {
                $difeSeg = $hora2 - $hora1 ; 
            }
            $diferencia = formatoHora($difeSeg) ; 
            return $diferencia ; 
    }


    /** Programa Horario  */
    // Muetra de mayor a menos las horas y la diferencia entre ambas 
    // int $hor1, $min1, $seg1, $hor2, $min2, $seg2, $segTotales1, $segTotales2
    // string $forma1, $forma2, $horaTotal1, $horaTotal2, $difeTotal
    // boolean $mayorMenor

    echo "Ingrese cantidad de horas: " ; 
    $hor1 = trim(fgets(STDIN)) ;
    echo "Ingrese cantidad de minutos: " ; 
    $min1 = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de segundos: " ; 
    $seg1 = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo(AM/PM): " ; 
    $forma1 = trim(fgets(STDIN)) ; 
    echo "Ingrese otra cantidad de horas: " ; 
    $hor2 = trim(fgets(STDIN)) ;
    echo "Ingrese otra cantidad de minutos: " ; 
    $min2 = trim(fgets(STDIN)) ; 
    echo "Ingrese otra cantidad de segundos: " ; 
    $seg2 = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo (AM/PM): " ; 
    $forma2 = trim(fgets(STDIN)) ; 

        $segTotales1 = aSegundos($hor1, $min1, $seg1, $forma1) ; 
        $segTotales2 = aSegundos($hor2, $min2, $seg2, $forma2) ;     
        $horaTotal1 = formatoHora($segTotales1) ; 
        $horaTotal2 = formatoHora($segTotales2) ;
        $difeTotal = difHoras($segTotales1, $segTotales2) ; 
        $mayorMenor = esMenor($segTotales1, $segTotales2) ; 

            if($mayorMenor) {
                echo "Las horas ordenadas de mayor a menor son: " . "\n" . 
                    $horaTotal2 . " son " . $segTotales2 . "\n" .
                    $horaTotal1 . " son " . $segTotales1 . "\n" ;
                echo "La diferencia es de: " . $difeTotal ; 
            } else {
                echo "Las horas ordenadas de mayor a menor son: " . "\n" .
                    $horaTotal1 . " son " . $segTotales1 . "\n" .
                    $horaTotal2 . " son " . $segTotales2 . "\n" ;
                echo "La diferencia total es de: " . $difeTotal ;
            }