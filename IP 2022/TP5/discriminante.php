<?php

    /**
     * Calcula una ecuacion cuadratica con bascara
     * @param int $a
     * @param int $b
     * @param int $c
     * @return int
     */

    function calcularDiscriminante($a, $b, $c) {
        // int $nuevoB, $discriminante, $denominador float $x1, $x2, $sinRaiz, $raizUnica
        
        $nuevoB = -1 * $b ; 
        $discriminante = ($b * $b) - 4 * ($a * $c) ; 
        $sinRaiz = sqrt($discriminante) ; 
        $denominador = 2 * $a ; 
        $raizUnica = ($nuevoB + $sinRaiz) / $denominador ; 
        $x1 = ($nuevoB + $sinRaiz) / $denominador ; 
        $x2 = ($nuevoB - $sinRaiz) / $denominador ; 

        if($discriminante == 0 ){
            echo "Las raices son dobles" . "\n" ;
            echo $raizUnica ; 
        }elseif($discriminante > 0) {
            echo "raiz1: " . $x1 . "\n" ;
            echo "raiz2: " . $x2 . "\n" ; 
        }elseif($discriminante < 0) {
            echo "No es posible calcular las raices" ; 
        }
        return $discriminante ;
    }  

    /** Programa Discriminante */
    // Muestra el resultado de baskara
    // int $coeA, $coeB, $coeC

    echo "Ingrese el valor de a: " ; 
    $coeA = trim(fgets(STDIN)) ;
    echo "ingrese el valor de b: " ; 
    $coeB = trim(fgets(STDIN)) ; 
    echo "Ingrese el valor de c: " ; 
    $coeC = trim(fgets(STDIN)) ;
    calcularDiscriminante($coeA, $coeB, $coeC) ; 