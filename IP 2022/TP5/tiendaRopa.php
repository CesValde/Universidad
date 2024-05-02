<?php 

    /**
     * Calcula el porcentaje de la compra 
     * @param int $numeroCliente
     * @param int $numeroCompra
     * @return int 
     */

    function calcPorcenCompra($numeroCliente, $numeroCompra) {
        // int $resto, $porcentaje 

        $resto = $numeroCompra % $numeroCliente ; 

            if($resto >= 0 && $resto <= 10) {
                $porcentaje = 10 ; 
            } elseif($resto >= 11 && $resto <= 20) {
                $porcentaje = 15 ; 
            } else {
                $porcentaje = 0 ; 
            }

            if(($numeroCompra / 1000) == 0) {
                $porcentaje = $porcentaje + 20 ; 
            }
        return $porcentaje ; 
    }

    /**
     * Calcula el porcentaje de la prenda
     * @param string $tipoPrenda
     * @param string $color 
     * @return int 
     */

    function calcPorcenPrenda($tipoPrenda, $color) {
        // int $porcentaje
            
        $porcentaje = 0 ;
        
            if($tipoPrenda == "remera"){
                if($color == "marron") {
                    $porcentaje = 10 ;
                } elseif($color == "amarillo") {
                    $porcentaje = 5 ; 
                }
            } elseif($tipoPrenda == "camisa") {
                if($color == "roja") {
                    $porcentaje = 35 ; 
                }
            } elseif($tipoPrenda == "pantalon") {
                if($color == "amarillo") {
                    $porcentaje = 35 ; 
                }
            }
        return $porcentaje ;
    }

    /** Programa Tienda Ropa */
    // Muestra el porcentaje total de procentaje 
    // int $nroCliente, $nroCompra, $porcenCompra, $porcenPrenda, $porcentajeTotal
    // string $prenda, $colorX 

    echo "Ingrese numero de cliente: " ; 
    $nroCliente = trim(fgets(STDIN)) ;
    echo "Ingrese numero de compra: " ; 
    $nroCompra = trim(fgets(STDIN)) ;
    echo "Ingrese tipo de prenda: " ; 
    $prenda = trim(fgets(STDIN)) ;
    echo "Ingrese color de la prenda: " ; 
    $colorX = trim(fgets(STDIN)) ;
        $porcenCompra = calcPorcenCompra($nroCliente, $nroCompra) ;
        $porcenPrenda = calcPorcenPrenda($prenda, $colorX) ; 
    $porcentajeTotal = $porcenCompra + $porcenPrenda ; 
    echo "El porcentaje total es de: " . $porcentajeTotal ; 