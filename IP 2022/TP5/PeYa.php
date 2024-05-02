<?php 

    /**
     * Calcula el costo del servivio
     * @param float $km
     * @return float 
     */

    function calcServivio($km) {
        // float $costo

            if($km < 1.5) {
                $costo = 65.50 ;
            } elseif($km >= 1.5 && $km < 4.5) {
                $costo = 98.60 ; 
            } elseif($km >= 4.5 && $km < 10) {
                $costo = 156.00 ; 
            } else {
                $costo = (170.50 + ($km - 10)) * 6.50 ; 
            }
        return $costo ; 
    }

    /**
     * Calcula el valor a descontar 
     * @param float $totalEnvio 
     * @param string $formaPago 
     * @param string $diaEnvio 
     * @param string $cupon 
     * @return float 
     */

    function calcDescuento($totalEnvio, $formaPago, $diaEnvio, $cupon) {
        // float $descuento

        $descuento = 0 ;

            if($formaPago == "credito") {
                if($diaEnvio == "JU" || "VI") {
                    $descuento = 25 ; 
                } else {
                    $descuento = 3 ; 
                }
            } else {
                $descuento = 5 ; 
            }
            
            if($cupon == "si") {
                $descuento = $descuento + 10 ; 
            }
            $descuento = ($totalEnvio * $descuento) / 100 ; 
        return $descuento ; 
    }

    /* Programa PeYa */
    // Muestra los valores pedidos
    // float $km, $costoX, $descuento, $total
    // string $pago, $dia, $cupon,

    echo "Ingrese distancia del envio: " ; 
    $km = trim(fgets(STDIN)) ; 
    echo "Ingrese forma de pago: " ; 
    $pago = trim(fgets(STDIN)) ; 
    echo "Ingrese dia: " ; 
    $dia = trim(fgets(STDIN)) ;
    echo "Ingrese si tiene cupon: " ; 
    $cupon = trim(fgets(STDIN)) ; 
        $costoX = calcServivio($km) ; 
        $descuento = calcDescuento($costoX, $pago, $dia, $cupon) ; 
        $total = $costoX - $descuento ; 
    echo "Para una distancia de: " . $km . "km el costo es: " . $costoX . "\n" ; 
    echo "El descuento es de: " . $descuento . "\n" ; 
    echo "El valor final es de: " . $total ; 