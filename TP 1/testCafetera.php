<?php 

    include "Cafetera.php" ;

    echo "Ingrese la cantidad actual de cafe: " ; 
    $cantActual = trim(fgets(STDIN)) ; 
    echo "Ingrese la cantidad maxima de la cafetera: " ; 
    $capacidadMax = trim(fgets(STDIN)) ;  
    $cafetera = new Cafetera($capacidadMax, $cantActual) ; 

    echo "Ingrese la cantidad de cafe a tomar: " ; 
    $cantidad = trim(fgets(STDIN)) ;  
    
    $cafetera -> llenarCafetera() ; 
    echo "La cafetera se ha llenado, la cantidad actual es de: " . $cafetera -> getCantActual() . "\n" ; 
    $disponible = $cafetera -> getCantActual() ;
    $pudoServir = $cafetera -> servirTaza($cantidad) ;
        if($pudoServir) {
            echo "Disfrute su cafe! \n" ; 
            echo "La cantidad actual es de: " . $cafetera -> getCantActual() . "\n" ; 
        } else { 
            echo "No tengo la cantidad de cafe suficiente! \n" ; 
            echo "Te pude servir $disponible ml \n" ;
        }
    echo "Ingrese la cantidad de cafe a agregar a la cafetera: " ; 
    $cantLlenado = trim(fgets(STDIN)) ; 
    $capacidadMax = $cafetera -> getCapacidadMax() ; 
    $cantActual = $cafetera -> getCantActual() ; 
    $capacidad = $capacidadMax - $cantActual ; 
        while($cantLlenado > $capacidad) {
            echo "Ingrese una cantidad igual o menor a $capacidad: \n" ; 
            $cantLlenado = trim(fgets(STDIN)) ; 
        }
    echo "Se ha agregado a la cafetera $cantLlenado ml \n" ; 
    $cantActual = $cantActual + $cantLlenado ;
    $cafetera -> agregarCafe($cantActual) ; 
    echo $cafetera ; 