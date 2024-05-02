<?php 

    /**
     * Guarda los datos ingresados en un array
     * @return array 
     */

    function leerDatosCirco() {
        // array $datosCirco

        $datosCirco = [] ; 

        echo "Ingrese nombre del circo: " ; 
        $datosCirco["nombre"] = trim(fgets(STDIN)) ; 
        echo "Ingrese finicio del circo: " ; 
        $datosCirco["finicio"] = trim(fgets(STDIN)) ; 
        echo "Ingrese el valor de la entrada: " ; 
        $datosCirco["valorEnt"] = trim(fgets(STDIN)) ; 
        echo "Ingrese cantidad de payasos: " ; 
        $datosCirco["cantPay"] = trim(fgets(STDIN)) ;

        return $datosCirco ; 
    }

    /* Programa Principal */
    // Muestra los valores del circo
    // array $datosCirco

    $datosCirco = leerDatosCirco() ; 
    print_r($datosCirco) ; 