<?php 

    /**
     * Calcula el costo de las lineas
     * @param float $cantSeniors
     * @param float $cantLineas
     * @return float 
     */

    function calcCosto($cantSeniors, $cantLineas) {
        // float $costo, $costoSenior, $subTotal 

        $costoSenior = 155000 ; 

        if($cantLineas < 10000) {
            $costo = 2 * $cantLineas ; 
        } elseif($cantLineas >= 10000 && $cantLineas < 90000) {
            $costo = 1.5 * $cantLineas ;
        } elseif($cantLineas >= 90000 && $cantLineas < 200000) {
            $costo = 1 * $cantLineas ; 
        } else {
            $costo = 0.75 * $cantLineas ; 
        }
        $subTotal = $cantSeniors * $costoSenior ;
        $costo = $costo + $subTotal ;
        return $costo ; 
    }

    /**
     * Calcula la cantidad de lineas de codigo
     * @param int $funcionalidad
     * @param string $tipoTecno
     * @return int
     */

    function calcLineas($funcionalidad, $tipoTecno) {
        // int $cantLineas, $cantLiFun

        $cantLiFun = $funcionalidad * 1000 ;
        
        if($tipoTecno == "Desktop") {
            $cantLineas = 50 * $funcionalidad ; 
        } elseif($tipoTecno == "Web") {
            $cantLineas = 100 * $funcionalidad ;
        } elseif($tipoTecno == "Embebido") {
            $cantLineas = 200 * $funcionalidad ;
        }
        $cantLineas = $cantLiFun + $cantLineas ;
        return $cantLineas ;
    }

    /**
     * Convierte de Junior a Senior
     * @param int $cantJunior
     * @return float 
     */

    function igualarASenior($cantJunior) {
        // $float $seniorsEquiva 

        $seniorsEquiva = $cantJunior / 3 ; 
        return $seniorsEquiva ; 
    }

    /** Programa AllProgram */
    // Calcula los costos de los sistemas que desarrolla
    // int $cantFuncio, $caSeniors, $caJuniors, $cantLi 
    // string $tiTecno  
    // float $costoTotal, $juniors, $seEqui,

    echo "Ingrese cantidad de funcionalidades: " ; 
    $cantFuncio = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de programadores Seniors: " ;
    $caSeniors = trim(fgets(STDIN)) ;
    echo "Ingrese cantidad de programadores Juniors: " ;
    $caJuniors = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo de tecnologia: " ;
    $tiTecno = trim(fgets(STDIN)) ;

    $juniors = igualarASenior($caJuniors) ; 
    $seEqui = $juniors + $caSeniors ;   
    $cantLi = calcLineas($cantFuncio, $tiTecno) ; 
    $costoTotal = calcCosto($seEqui, $cantLi) ; 

    echo "El costo total es: " . $costoTotal ; 