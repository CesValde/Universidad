<?php 

    /**
     * Retorna la suma de todos los celulares
     * @param array $valorCelular
     * @return float
     */

    function sumaValores($valorCelular) {
        // float $total 

        $total = 0 ; 

        for($i=0 ; $i<count($valorCelular) ; $i++) {
            $acum = $valorCelular[$i] ; 
            $total = $total + $acum ; 
        }    
        return $total ; 
    }

    /* Programa Celulares */
    // Muestra el celular y su valor debido al numero ingresado
    // array $modeloCelular, $valorCelular,
    // int $n
    // float $totalX

    $modeloCelular = ["Moto G6", "Samsung J7", "LG K9", "Iphone SE", "Galaxy A9"] ; 
    $valorCelular = [22030.90, 10500.00, 27999.00, 38105.00, 17000.80] ; 

    echo "Ingrese un numero de celular a mostrar " ; 
    $n = trim(fgets(STDIN)) ; 
    $n = $n - 1 ; 
        if($n >= count($modeloCelular) && $n >= count($valorCelular)) {          
            echo "No existe un celular/valor en esa posicion" ;
        } else {
            echo "Modelo de celular: " . $modeloCelular[$n] . "\n" ; 
            echo "Valor del celular: " . $valorCelular[$n] . "\n" ; 
            $totalX = sumaValores($valorCelular) ; 
            echo "La suma de todos los celulares: " . $totalX ; 
        }