<?php 

    /**
     * Calcula la superficie circular 
     * @param float $radio
     * @return float
     */

    function superficieCir($radio) {
        // float $superficie

        $superficie = M_PI * ($radio * $radio) ; 
        return $superficie ; 
    }

    /**
     * Calcula la superifice de la corona circular 
     * @param float $radioMayor
     * @param float $radioMenor
     * @return float
     */

    function superficieCorona($radioMayor, $radioMenor) {
        // float $corona

        $corona = $radioMayor - $radioMenor ; 
        return $corona ; 
    }

    /** Programa coronaCircular */
    // Muestra el area de una corona circular 
    // float $raMayor, $raMenor, $coronaCirMa, $coronaCirMe, $coronaCircular

    echo "Ingrese el radio mayor: " ; 
    $raMayor = trim(fgets(STDIN)) ; 
    echo "Ingrese el radio menor: " ; 
    $raMenor = trim(fgets(STDIN)) ; 
    $coronaCirMa = superficieCir($raMayor) ; 
    $coronaCirMe = superficieCir($raMenor) ; 
    $coronaCircular = superficieCorona($coronaCirMa, $coronaCirMe) ; 
    echo "El area de la corona circular es: " . $coronaCircular . "\n" ; 

    echo $coronaCirMa . "\n" ; 
    echo $coronaCirMe ; 