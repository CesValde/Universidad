<?php 

    /**
     * Calcula la base elevada al exponente
     * @param int $base
     * @param int $exponente
     * @return float // retorna el cálculo de la potencia
     */
    
    function potencia($base, $exponente) {
        // float $resultado

        $resultado = pow($base, $exponente) ; 
        return $resultado ; 
    }

    /**
     * Calcula la raiz cuadrada de un número
     * @param int $nro
     * @return int // retorna el calculo de la raiz cuadrada
     */
    function raiz($nro) {
        // float $resulta

        $resulta = sqrt($nro) ; 
        return $resulta ; 
    }

    /**
     * Calcula el valor absoluto de un número
     * @param int $nume
     * @return float // retorna el valor absoluto
     */
    function valorAbs($nume) {
        // float $result

        $result = abs($nume) ; 
        return $result ; 
    }

    /** Programa Principal */
    // Resultados de los modulos anteriores
    // int $nu, $expone, $result1 float $result2, $result3 

    echo "Ingrese un numero mayor a 10: " ; 
    $nu = trim(fgets(STDIN)) ; 
    echo "Ingrese exponente para la potencia: " ; 
    $expone = trim(fgets(STDIN)) ; 
    $result1 = potencia($nu, $expone) ; 
    $result2 = raiz($nu) ; 
    $result3 = valorAbs($nu) ; 
    echo $result1 . "\n" ;
    echo $result2 . "\n" ; 
    echo $result3 . "\n" ; 