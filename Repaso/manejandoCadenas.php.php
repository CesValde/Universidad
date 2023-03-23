<?php 

    /**
     * Calcula la cantidad de letras que hay en la palabra
     * @return int 
     */
    function calcCantLetras() {
        // int $cantLetras
        // string $cadena

        echo "Ingrese una cadena de caracteres que termine con un '.' : " ; 
        $cadena = trim(fgets(STDIN)) ; 
            $cantLetras = strlen($cadena) ; 
            $cadena = str_replace(" ", "", $cadena) ;       // los espacios entre palabras los quita ej: hola bro -> holabro
            $cantLetras-- ; 
            echo $cantLetras . "\n" ;
        
        return $cantLetras ; 
    }

    /**
     * Dado un texto terminado en / y un caracter, determina cuantas veces aparece ese caracter en la cadena.
     * @return int 
     */
    function cuentaCaracter() {
        // int $cantCaracter
        // string $texto, $caracter

        echo "Ingrese un texto que termine en '/': " ; 
        $texto = trim(fgets(STDIN)) ; 
        echo "Ingrese un caracter del texto ingresado: " ; 
        $caracter = trim(fgets(STDIN)) ; 
        $cantCaracter = substr_count($texto, $caracter) ; 
        echo "El caracter '$caracter' aparece '$cantCaracter' veces en el texto" . "\n" ; 
        
        return $cantCaracter ; 
    }

    /**
     * Dada 2 cadenas cadena1 y cadena2 retorna verdadero si cadena2 se encuentra en cadena1 y falso en caso contrario.
     * @return boolean
     */
    function encuentraCadena() {
        // string $cadena1, $cadena2
        // boolean $encuentra

        $cadena1 = "Esto es una cadena de texto.";
        $cadena2 = "cadena";

        $encuentra = strpos($cadena1, $cadena2) ; 
            if($encuentra) {
                echo "Verdadero \n";
            } else {
                echo "Falso \n";
            }
        return $encuentra ; 
    }
    
     /**
     * Retorna su longitud sin utilizar la función count de PHP.
     * @return int
     */
    function longitud() {
        // string $cadena
        // int $longitud
       
        echo "Ingrese una cadena: " ; 
        $cadena = trim(fgets(STDIN)) ; 
        $longitud = strlen($cadena) ; 
        echo "la longitud de la cadena es: $longitud \n" ; 

        return $longitud ; 
    }

    /**
     * Retorna su longitud sin utilizar la función count de PHP.
     * @return int
     */
    function mayorLongitud() {
        // string $cadena
        // int $longitud
       
        echo "Ingrese una cadena: " ; 
        $cadena1 = trim(fgets(STDIN)) ; 
        echo "Ingrese otra cadena: " ; 
        $cadena2 = trim(fgets(STDIN)) ; 
            if(strlen($cadena1) > strlen($cadena2)) {
                $mayLongi = $cadena1 ; 
            } else {
                $mayLongi = $cadena2 ; 
            }
        echo "La cadena de mayor longitud es $mayLongi \n" ; 

        return $mayLongi; 
    }

    /* Programa Principal */
    // Despliega un menu con las opciones a querer ejecutar
    // int $opcion 

    do {
        echo "Ingrese un numero: " ; 
        $opcion = trim(fgets(STDIN)) ; 

        switch($opcion) {
            case 1: 
                calcCantLetras() ; 
                break ; 
            case 2: 
                cuentaCaracter() ; 
                break ; 
            case 3: 
                encuentraCadena() ; 
                break ; 
            case 4:
                longitud() ;
                break ; 
            case 5:
                mayorLongitud() ; 
                break ; 
        }    
    }  while($opcion != 6) ; 