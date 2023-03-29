<?php 

    include "classCafetera.php" ;

    $cafetera = new Cafetera(100, 60) ; 

    echo $cafetera -> getCapacidadMax() . "\n" ;
    echo $cafetera -> getCantActual() . "\n" ; 

    echo $cafetera -> llenarCafetera() . "\n" ; 
    echo $cafetera -> servirTaza(40) . "\n" ; 
    echo $cafetera -> vaciarCafetera() . "\n" ; 

    echo "Ingrese cantidad de cafe para agregar a la cafetera: " ; 
    $cantidad = trim(fgets(STDIN)) ; 
    echo $cafetera -> agregarCafe($cantidad) . "\n" ; 