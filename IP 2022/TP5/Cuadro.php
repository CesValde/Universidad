<?php 

    /**
     * Calcula la superficie del cuadro 
     * @param float $base 
     * @param float $altura 
     * @return float 
     */

    function calcularSuperficie($base, $altura) {
        // float $superficie 

        $superficie = $base * $altura ; 
        return $superficie ; 
    }

    /** 
     * Calcula el precio final del cuadro
     * @param string $clasificacion
     * @param float $superficie
     * @param float $precioBase
     * @return float 
     */

    function calcularPrecio($clasificacion, $superficie, $precioBase) {
        // float $precioFinal 

            if($clasificacion == "P" || $clasificacion == "M") {
                $precioFinal = $precioBase + ($precioBase * 15) / 100 ; 
            } elseif($clasificacion == "E") {
                $precioFinal = $precioBase + ($precioBase * 5) / 100 ; 
            } else {
                $precioFinal = $precioBase + ($precioBase * 2) / 100 ; 
            }

            if($superficie > 2) {
                $precioFinal = $precioFinal + ($precioBase * 10) / 100 ; 
            } elseif($superficie >= 1 && $superficie < 2) {
                $precioFinal = $precioFinal + ($precioBase * 8) / 100 ; 
            }
        return $precioFinal ;
    }


    /** Programa Cuadro */
    // Muestra la superficie y precio final del cuadro
    // float $altu, $bas, $precioBa, $super, $precioFi
    // string $clase, 

    echo "Ingrese clasificacion del cuadro 'Premium (P)', 'Master(M)', o 'Estandar(E): " ; 
    $clase = trim(fgets(STDIN)) ; 
    echo "Ingrese la altura del cuadro: " ;
    $altu = trim(fgets(STDIN)) ;
    echo "Ingrese la base del cuadro: " ; 
    $bas = trim(fgets(STDIN)) ; 
    echo "Ingrese el precio base: " ;
    $precioBa = trim(fgets(STDIN)) ; 
        $super = calcularSuperficie($bas, $altu) ; 
        $precioFi = calcularPrecio($clase, $super, $precioBa) ; 
    echo "La superficie del cuadro es: " . $super . "\n" . 
    "El precio final es de: " . $precioFi ;