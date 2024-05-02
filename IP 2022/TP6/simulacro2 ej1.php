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
                if($num % 2 == 0) {
                    $bandera = false ; 
                }
            }
        return $bandera ; 
    }


    /**
     * @param int $num 
     * @return boolean 
     */

    function esNroElegido2($num) {
        // int $umbral, $i boolean $bandera

        $umbral = ((int)($num / 2) + 1) ; 
        $bandera = true ;
        $i = 2 ; 
            while($i < $umbral) {              
                $bandera = !($num % 2 == 0) ; 
                $i++ ;
            }
        return $bandera ; 
    }