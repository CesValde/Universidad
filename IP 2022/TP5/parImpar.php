<?php 

    /** 
     * Calcula si un numero es par o impar
     * @param int $numero
     * @return boolean 
     */

    function esPar($numero){
        /* boolean $resultado */ 

    if ($numero % 2 == 0 ) { 
        $resultado = true ;
    } else { 
        $resultado = false ;
    }
    return $resultado ; 
    } 

    
    /* Programa ParImpar */ 
    /* int $nume boolean $resul */ 

    echo "Ingrese un numero" ; 
    $num = trim(fgets(STDIN)) ;  
    $resul = esPar ($num) ;
    if($resul) {
        echo "el nro" . $num . " es par" ;
    } else {
        echo "el nro" . $num . " es impar" ;
    } 
