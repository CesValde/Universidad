<?php 

    /** 
     * Calcula el monto del alquiler 
     * @param float $kmRecorridos
     * @return float
     */

    function alquila($kmRecorridos) {
        // float $alquiler
        
        if($kmRecorridos < 300) {
            $alquiler = 850 ; 
        } elseif($kmRecorridos > 300 && $kmRecorridos <= 1000) {
            $alquiler = 850 + 10.5 * ($kmRecorridos - 300) ; 
        } elseif($kmRecorridos > 1000) {
            $alquiler = 850 + 10.5 * 700 + 8.5 * ($kmRecorridos - 1000) ; 
        } 
        return $alquiler ; 
    }

    /**
     * Calcula el impuesto por alquiler del auto
     * @param float $subTotal
     * @return float
     */

    function calcIva($alquilerX) {
        // float $iva, $bruto

        $bruto = $alquilerX / 1.21  ; 
        $iva = $alquilerX - $bruto ; 
        return $iva ; 
    }


    /** Programa alquilaAuto */
    // Determina el monto a pagar por el alquiler y iva del vehiculo 
    // float $kmReco, $alqui, $impuesto,

    echo "Ingrese km recorridos: " ; 
    $kmReco = trim(fgets(STDIN)) ; 
    $alqui = alquila($kmReco) ;
    $impuesto = calcIva($alqui) ; 
    echo "El monto a pagar por el alquiler es: " . $alqui . "\n" . 
    "el iva es de: " . $impuesto ;