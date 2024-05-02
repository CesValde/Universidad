<?php 

    /**
     * Calcula el puntaje obtenido por nivel 
     * @param int $nroNivel
     * @param string $nombreEnemigo
     * @return int 
     */

    function calcExp($nroNivel, $nombreEnemigo) {
        // int $exp

        $exp = ($nroNivel * 20) + ($nroNivel % 5) ; 

            if($nombreEnemigo == "PAX") {
                $exp = $exp + 1000 ; 
            }
        return $exp ; 
    }

    /* Programa Juego */
    // Muestra la exp obtenida
    // int $numNvl, $experiencia 
    // string $nombreEnemigo

    echo "Ingrese el numero de nvl: " ; 
    $numNvl = trim(fgets(STDIN)) ; 
    echo "Ingrese nombre del enemigo: " ; 
    $nombreEnemigo = trim(fgets(STDIN)) ; 
    $experiencia = calcExp($numNvl, $nombreEnemigo) ; 
    echo "La exp obtenida es: " . $experiencia ; 