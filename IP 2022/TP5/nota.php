<?php 

    /** Programa Nota */
    // Calcula si un alumno aprobo o desaprobo 
    // int $nota string $result

    echo "ingrese la nota: " ; 
    $nota = trim(fgets(STDIN)) ; 
    if($nota >= 4 && $nota <= 10) {
        $result = "El alumno aprobo" ; 
    } elseif($nota <= 0 || $nota > 10) {
        $result = "Nota invalida" ; 
    } else {
        $result = "El alumno desaprobo" ; 
    }
    echo $result ; 