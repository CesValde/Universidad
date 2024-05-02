<?php 

    /**
     * Calcula la suma filtrada 
     * @param int $centinela
     * @return int 
     */

    function sumaFiltrada($centinela) {         
        // int $sumaFi, $i 

        $sumaFi = 0 ;
        $aux = 0 ;
        $i = 1 ; 

        echo "Ingrese numero " . $i . " " ;
        $nro = trim(fgets(STDIN)) ; 
          
            while($nro <> $centinela ) {                              
                if($nro > $aux) {
                    $sumaFi = $sumaFi + $nro ;                   
                } 
                $aux = $nro ; 
                $i++ ; 
                echo "Ingrese numero " . $i . " " ; 
                $nro = trim(fgets(STDIN)) ;                        
            }
        return $sumaFi ; 
    }

    /* Programa Suma Filtrada */
    // Muestra por pantalla la suma filtrada
    // int $centi, $sumaFil

    echo "Ingrese centinela: " ; 
    $centi = trim(fgets(STDIN)) ; 
        $sumaFil = sumaFiltrada($centi) ;
    echo $sumaFil ; 