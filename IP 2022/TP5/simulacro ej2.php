<?php 

    /**
     * Calcula el costo del aviso clasificado
     * @param int $cantLineas 
     * @return float 
     */

    function calcClasificado($cantLineas) {
        // float $costoC

        if($cantLineas <= 3) {
            $costoC = 150 ; 
        } elseif($cantLineas > 3) {                         // mejor poner else 
            $costoC = ( 150 + ($cantLineas - 3)) * 25 ; 
        } 
        return $costoC ; 
    }   

    /** 
     * Calcula el costo del aviso de publicidad 
     * @param int $cantLetras
     * @param string $color
     * @return float
     */ 

    function calcPublicidad($cantLetras, $color) {
        // float $costoP, $porcentaje

        if($cantLetras <= 300) {
            $costoP = 556.50 ;
        } elseif($cantLetras >= 301 && $cantLetras <= 500) {
            $costoP = 950.00 ;
        } else {
            $costoP = 2300 ; 
        }
        if($color == "color") {
            $porcentaje = ($costoP * 10) / 100 ; 
            $costoP = $porcentaje + $costoP ;     
        }
        return $costoP ;
    }

    /**
     * Calcula el tipo de aviso
     * @param string $tipoAviso
     * @return boolean 
     */

    function esPublicidad($tipoAviso) {
        // boolean $aviso

        if($tipoAviso == "publicidad") {
            $aviso = true ; 
        } else {
            $aviso = false ;
        }
        return $aviso ;
    }

    /** Programa Principal */
    // Presupuesta los tipos de aviso
    // int $cantLi, $cantLe, float $costoPubli, $costoClasi string $colores $tipAvis boolean $avisoX

    echo "Tipo de aviso, 'Publicidad' o 'clasificado' ? " ;
    $tipAvis = trim(fgets(STDIN)) ; 
    $avisoX = esPublicidad($tipAvis) ;

        if($avisoX) {
            echo "Ingrese cantidad de letras: " ;
            $cantLe = trim(fgets(STDIN)) ; 
            echo "Se trata de aviso a color o blanco/negro: " ;
            $colores = trim(fgets(STDIN)) ;
            $costoPubli = calcPublicidad($cantLe, $colores) ; 
            echo $costoPubli ;
        } else {
            echo "Ingrese cantidad de lineas: " ; 
            $cantLi = trim(fgets(STDIN)) ; 
            $costoClasi = calcClasificado($cantLi) ;
            echo $costoClasi ;
        }