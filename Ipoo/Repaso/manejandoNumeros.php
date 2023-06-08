<?php 

    /**
     * Calcula el factorial del numero ingresado
     * @return int
     */

    function factorial() {
        // int $i, $factorial 

        $factorial = 1 ; 

        echo "Ingrese un numero para obtener su factorial: " ; 
        $n = trim(fgets(STDIN)) ; 
            for($i = 1 ; $i <= $n ; $i++) {
                $factorial = $factorial * $i ;            
            }

        echo "El factorial de " . $n . " es: " . $factorial . "\n" ; 

        return $factorial ; 
    }

    /**
     * Calcula si es un numero par 
     * @return boolean
     */

    function esPar() {
        // int $n
        // boolean $par 
        
        echo "Ingrese un numero para saber si es par: " ; 
        $n = trim(fgets(STDIN)) ; 
            if($n % 2 == 0) {
                $par = true ; 
            } else {
                $par = false ; 
            }
        return $par ; 
    }

    /**
     * Calcula si n es divisible por m 
     * @return boolean 
     */

    function divisible($n, $m) {
        // int $n, $m
        // boolean $divisible

            if($n % $m == 0) {
                $divisible = true ; 
            } else {
                $divisible = false ; 
            }
        return $divisible ; 
    }

    /**
     * Encuentra el menor y mayor valor del array 
     */

        function determinaPosicion() {
            // array $numeros
            // int $mayor, $menor, $i, $j

            $coleccionNum = [] ; 
            $mayor = -1 ; 
            $menor = 99999999 ; 

            $coleccionNum = [2, 4, 20, 40, 35, 15, 77] ; 

            for($i=0 ; $i<count($coleccionNum) ; $i++) {
                if($coleccionNum[$i] < $menor) {
                    $menor = $coleccionNum[$i] ; 
                }
            }
            for($j=0 ; $j<count($coleccionNum) ; $j++) {
                if($coleccionNum[$j] > $mayor) {
                    $mayor = $coleccionNum[$j] ; 
                }
            }

            echo "El numero mayor es: " . $mayor . "\n" ; 
            echo "El numero menor es: " . $menor . "\n" ; 
        }

        /**
         * Almacena cantidad n de nombres en un arrray indexado
         * @param string $nombre
         * @return array 
         */
        function leerNombres($cantNombres) {
            // array $nombres
            // int $i 

            $nombres = [] ; 

            for ($i = 0; $i < $cantNombres; $i++) {
                // $nombre = readline("Ingrese un nombre: ");
                echo "Ingrese un nombre: " ; 
                $nombre = trim(fgets(STDIN)) ; 
                array_push($nombres, $nombre);
            }
            return $nombres;
        }

        /**
         * Retorna en un arreglo los años biciestos anteriores al año ingresado 
         * @return array
         */
        
        function anosBiciestos($anio) {
            // array $biciestos

            $bisiestos = array() ;

            for ($i = $anio-1; $i > 0; $i--) {
                if (($i % 4 == 0 && $i % 100 != 0) || $i % 400 == 0 && $i % 100 == 0) {
                    array_push($bisiestos, $i) ;
                }
            }
            return $bisiestos;
        }
  
        /**
         * Almacena en un array los elemenos de los arrays frutas y nombres
         * @return array 
         */
        function juntarValores() {
            // array $frutas, $nombres, $resul

            $frutas = ["Manzana", "Pera"] ; 
            $nombres = ["Cesar", "Soledad"] ; 
            $resul = [] ; 

            $resul = array_merge($frutas, $nombres) ; 

            return $resul ; 
        }

        /**
         * Almacena en un array los elemnetos del array1 que no estan en el array2 
         * @return array 
         */
        function asociarValores() {
            // array $array1, $array2, $resul

            $array1 = ["Arepa", "Rgb", "Negro"] ; 
            $array2 = ["Arepa", "Soledad", "Rgb"] ; 
            $resul = [] ; 

            $resul = array_diff($array1, $array2) ; 

            return $resul ; 
        }

        /* Programa Principal */
        // Despliega un menu con las opciones a querer ejecutar
        // int $ocpion, $n, $m, $cantidadNombres, $anio, 
        // string 
        // boolean $par, $divisible
        // array $coleccionNombres, $biciestos, $array, $array2

        do {
            echo "Ingrese un numero: " ; 
            $opcion = trim(fgets(STDIN)) ; 

            switch($opcion) {
                case 1: 
                    factorial() ; 
                    break ; 
                case 2: 
                    $par = esPar() ;
                        if($par) {
                            echo "El numero es par" . "\n" ; 
                        } else {
                            echo "El numero es impar" . "\n" ; 
                        }
                    break ; 
                case 3: 
                    echo "Ingrese un numero: " ; 
                    $n = trim(fgets(STDIN)) ; 
                    echo "Ingrese otro numero: " ; 
                    $m = trim(fgets(STDIN)) ; 
                    $divisible = divisible($n, $m) ; 
                        if($divisible) {
                            echo "El numero $n es divisible por el numero $m" . "\n" ; 
                        } else {
                            echo "El numero $n no es divisible por el numero $m" . "\n" ; 
                        }
                    break ; 
                case 4: 
                    determinaPosicion() ; 
                    break ; 
                case 5:
                    echo "Ingrese cantidad de nombres a guardar: " ; 
                    $cantidadNombres = trim(fgets(STDIN)) ; 
                    $coleccionNombres = leerNombres($cantidadNombres) ; 
                    print_r($coleccionNombres) ; 
                    break ; 
                case 6: 
                    echo "Ingrese año: " ; 
                    $anio = trim(fgets(STDIN)) ; 
                    $biciestos = anosBiciestos($anio) ; 
                    print_r($biciestos) ; 
                    break ; 
                case 7:
                    $array = juntarValores() ; 
                    print_r($array) ;
                    break ; 
                case 8:
                    $array2 = asociarValores() ;
                    print_r($array2) ; 
                    break ; 
            }    
        }  while($opcion != 9) ; 