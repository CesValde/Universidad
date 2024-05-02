<?php 

    /* Programa Cine */
    // Muestra los valores pedidos 
    // int  $cantEntradasVendidas, $cantEntradasfrozen, $superiorA300, $cantVentas, $i, $cantEntradas 
    // float $montoTotal, $porcentajeFrozen, $montoFrozen, $entradaMasBarata, $valorEntrada, 
    // string $nombrePelicula, 

    $montoTotal = 0 ; 
    $cantEntradasVendidas = 0 ; 
    $porcentajeFrozen = 0 ; 
    $cantEntradasfrozen = 0 ;
    $montoFrozen = 0 ; 
    $superiorA300 = 0 ; 
    $entradaMasBarata = 9999 ; 

        echo "Ingrese cantidad de ventas: " ; 
        $cantVentas = trim(fgets(STDIN)) ; 
            for($i = 1 ; $i <= $cantVentas ; $i++) {
                echo "Ingrese nombre de la pelicula: " ; 
                $nombrePelicula = trim(fgets(STDIN)) ; 
                echo "Ingrese valor de la entrada: " ; 
                $valorEntrada = trim(fgets(STDIN)) ;
                echo "Ingrese cantidad de entradas: " ;
                $cantEntradas = trim(fgets(STDIN)) ;
                $montoTotal = $montoTotal + ($valorEntrada * $cantEntradas) ; 
                $cantEntradasVendidas = $cantEntradasVendidas + $cantEntradas ; 
                    if($nombrePelicula == "Frozen") {
                        $montoFrozen = $montoFrozen + $valorEntrada * $cantEntradas ; 
                        $cantEntradasfrozen = $cantEntradasfrozen + $cantEntradas ;
                    }
                    if($valorEntrada > 300) {
                        $superiorA300 = $superiorA300 + 1 ;  
                    }
                    if($valorEntrada < $entradaMasBarata) {
                        $nombreMasbarata = $nombrePelicula ; 
                        $entradaMasBarata = $valorEntrada ; 
                    }
            }
        if($cantVentas == 0) {
            echo "Ninguna entrada fue vendida" ; 
        } else {
            $porcentajeFrozen = (($cantEntradasfrozen * 100) / $cantEntradasVendidas) ; 
            echo $montoTotal . "\n" ; 
            echo $cantEntradasVendidas . "\n" ; 
            echo $porcentajeFrozen . "\n" ; 
            echo $montoFrozen . "\n" ; 
            echo $superiorA300 . "\n" ; 
            echo $nombreMasbarata . " " . $entradaMasBarata ; 
        }