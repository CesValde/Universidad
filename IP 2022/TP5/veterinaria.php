<?php 

    /**
     * Calcula la cantidad de analgesicos 
     * @param int $edad
     * @param float $peso
     * @param string $tipoMascota
     * @return float 
     */

    function calcAnalgesicos($edad, $peso, $tipoMascota) {
        // float $cantidadAnalge

            if($tipoMascota == "perro") {
                if($peso < 5) {
                    $cantidadAnalge = 100 ; 
                } elseif($peso >= 5 && $peso <= 15) {
                    $cantidadAnalge = 150 ; 
                } else {
                    $cantidadAnalge = 300 ; 
                }
                if($edad > 6) {
                    $cantidadAnalge = $cantidadAnalge + (10 * ($edad - 6)) ;
                }
            } elseif($tipoMascota == "gato") {
                if($peso < 1) {
                    $cantidadAnalge = 80 ; 
                } elseif($peso >= 1 && $peso <= 3) {
                    $cantidadAnalge = 120 ; 
                } else {
                    $cantidadAnalge = 200 ; 
                }
            } elseif($tipoMascota == "conejo") {
                if($edad <= 2) {
                    $cantidadAnalge = 20 ; 
                } else {
                    $cantidadAnalge = 25 ; 
                }
                if($peso > 0.5) {
                    $cantidadAnalge = $cantidadAnalge + (1 * ($peso - 0.5)) ; 
                }
            } else {
                $cantidadAnalge = 0 ;
            }
        return $cantidadAnalge ; 
    }

    /**
     * Calcula el monto de la consulta 
     * @param float $cantidadAnalge
     * @return int 
     */

    function calcConsulta($cantidadAnalge) {
        // int $consulta

        $consulta = 1500 ; 
            if($cantidadAnalge > 0 && $cantidadAnalge < 100) {
                $consulta = $consulta + 1000 ; 
            } 
            if($cantidadAnalge > 100) {
                $consulta = $consulta + (50 * ($cantidadAnalge - 100)) ; 
            }
        return $consulta ; 
    }

    /** Programa veterinaria */
    // Muestra la cantidad de analgesicos y el monto total de la consulta
    // int $edadX, $montoConsulta
    // float $pesoX, $cantAnalgesi
    // string $tipMascota 

    echo "Ingrese la edad de la mascota: " ; 
    $edadX = trim(fgets(STDIN)) ;       
    echo "Ingrese el peso de la mascota: " ;    
    $pesoX = trim(fgets(STDIN)) ;
    echo "ingrese tipo de mascota: " ; 
    $tipMascota = trim(fgets(STDIN)) ;
        $cantAnalgesi = calcAnalgesicos($edadX, $pesoX, $tipMascota) ; 
        $montoConsulta = calcConsulta($cantAnalgesi) ; 
    echo "La cantidad de analgesico es: " . $cantAnalgesi . "\n" ; 
    echo "El monto total es de: " . $montoConsulta ; 