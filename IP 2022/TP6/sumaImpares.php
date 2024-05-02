<?php 

    /**
     * Calcula la suma de numeros impares que hay entre dos numeros
     * @param int $numA
     * @param int $numB
     * @return int
     */

    function calcSuma($numA, $numB) {
        // int $suma

        $suma = 0 ;

            if($numA % 2 != 0) {                     // aseguro que no incluya el nro impar ingresado. $numA es impar ?
                $numA = $numA + 1 ; 
            }
            for($i = $numA ; $i < $numB ; $i++) {
                if($i % 2 <> 0) {                    // $i es impar ?
                    $suma = $suma + $i ; 
                }
            }
        return $suma ;
    }

    /** Programa Impares */
    // Muestra la suma de numeros impares entre dos numeros
    // int $numeroA, $numeroB, sumaX

    echo "Ingrese el primer numero: " ; 
    $numeroA = trim(fgets(STDIN)) ; 
    echo "Ingrese el segundo numero: " ; 
    $numeroB = trim(fgets(STDIN)) ; 
        $sumaX = calcSuma($numeroA, $numeroB) ; 
    echo "El resultado de la suma es: " . $sumaX ; 