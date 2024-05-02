<?php 

    /** 
     * Calcula el puntaje 
     * @param int $numeroPrueba 
     * @param string $tipoPrueba
     * @return int 
     */

    function calcPuntaje($numeroPrueba, $tipoPrueba) {
        // int $puntaje 

        $puntaje = $numeroPrueba % 20 ;

            if($tipoPrueba == "Conquista") {
                $puntaje = $puntaje + 40 ; 
            } elseif($tipoPrueba == "Supervivencia") {
                $puntaje = $puntaje + 25 ;
            }
        return $puntaje ;
    }

    /** 
     * Calcula los minutos extras
     * @param int $puntaje 
     * @return int
     */

    function calcMinutosExtras($puntaje) {
        // int $minutosExtras

            if($puntaje < 26) {
                $minutosExtras = 3 ; 
            } elseif($puntaje >= 26 && $puntaje < 33) {
                $minutosExtras = 4 ; 
            } elseif($puntaje >= 33 && $puntaje < 41) {
                $minutosExtras = 5 ;
            } else {
                $minutosExtras = 6 ;
            }
        return $minutosExtras ; 
    }

    /** Programa Neoempires */
    // Muestra los minutos extras 
    // int $numPrueba, $puntajeX, $minExtras 
    // string $tipPrueba 

    echo "Ingrese numero de prueba: " ;
    $numPrueba = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo de prueba: " ; 
    $tipPrueba = trim(fgets(STDIN)) ; 
        $puntajeX = calcPuntaje($numPrueba, $tipPrueba) ; 
        $minExtras = calcMinutosExtras($puntajeX) ; 
    echo "Los minutos extras son: " . $minExtras ; 