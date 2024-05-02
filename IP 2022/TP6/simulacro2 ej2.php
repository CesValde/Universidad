<?php 

    /**
     * @param int $num
     * @return boolean 
     */

    function esNroElegido1($num) {
        // int $umbral, $i boolean $bandera

        $umbral = ((int)($num / 2) + 1) ; 
        $bandera = true ;
            for($i = 2 ; $i < $umbral ; $i++) {
                if($num % $i == 0) {
                    $bandera = false ; 
                }
            }
        return $bandera ; 
    }

    /**
     * Suma los números naturales Elegidos menores o iguales a num
     * @param int $num
     * @return int 
     */

    function sumaELegidos($num) {
        // int $suma, $i boolean $nroElegido

        $suma = 0 ; 
        $aux = 0 ; 
            
            for($i = 2 ; $i <= $num ; $i++) {   
                $nroElegido = esNroElegido1($i) ;
                    if($i <> $aux) {
                        if($nroElegido) {
                            $suma = $suma + $i ;  
                            $aux = $i ;                          
                        }                         
                    }                                
            }
        return $suma ; 
    }