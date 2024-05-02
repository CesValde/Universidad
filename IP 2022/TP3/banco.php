<?php 

    // PROGRAMA Sueldo
    // Calcula el abono por cuota
    // float $suma, $cuota, $porcentaje

    echo "Ingrese la suma: " ; 
    $suma = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de cuotas: " ; 
    $cuotas = trim(fgets(STDIN)) ; 
    echo "Ingrese el porcentaje de interes: " ; 
    $porcentaje = trim(fgets(STDIN)) ;
    $total = $suma + (($porcentaje / 100) * $suma) ;
    $total = $total / $cuotas ; 
    echo "La cantidad a abonar por cuota es: " . $total ; 