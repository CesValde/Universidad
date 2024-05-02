<?php 

    /** 
     * Retorna el valor del factor 
     * @param string $mes 
     * @return int
     */

    function factores($mes) {
        // int $valorFactor 
        
        if($mes == "Enero" || $mes == "Febrero" || $mes == "Marzo") {
            $valorFactor = 15 ; 
        } elseif($mes == "Abril" || $mes == "Mayo" || $mes == "Junio") {
            $valorFactor = 17 ; 
        } elseif($mes == "Julio" || $mes == "Agosto") {
            $valorFactor = 19 ; 
        } elseif($mes == "Septiembre" || $mes == "Octubre" || $mes == "Noviembre") {
            $valorFactor = 20 ; 
        } else {
            $valorFactor = 21 ;
        } 
        return $valorFactor ; 
    }

    /** Programa Productividad */
    // Calcula la productividad segun el mes 
    // int $numArti, $productividad, $factorX String $mesX

    echo "Ingrese mes: " ; // el mes tiene que empezar en Mayus (Obligatorio para que el modulo funcione)
    $mesX = trim(fgets(STDIN)) ; 
    echo "Ingrese nro de articulos producidos: " ; 
    $numArti = trim(fgets(STDIN)) ; 
    $factorX = factores($mesX) ; 
    $productividad = $numArti * $factorX ; 
    echo "En el mes de " . $mesX . " se produjeron " . $numArti . " por lo tanto la productividad es de : " . 
    $productividad ; 