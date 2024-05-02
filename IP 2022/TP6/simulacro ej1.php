<?php 

    /* Programa Candidatos */
    // Muestra los valores pedidos
    // int $cantCandidatos, $sumaEdad, $puntajeAlto, $cantPuntaje1, $cantPuntaje2, $cantPuntaje3, $edad, $puntaje, $edadPuntajeMayor
    // float $promedio 
    // string $nombre, $respuesta, $nombrePuntajeMayor

    $cantCandidatos = 0 ; 
    $sumaEdad = 0 ; 
    $puntajeAlto = -1 ; 
    $cantPuntaje1 = 0 ; 
    $cantPuntaje2 = 0 ; 
    $cantPuntaje3 = 0 ; 

    do {
        echo "Ingrese nombre del candidato: " ; 
        $nombre = trim(fgets(STDIN)) ;
        echo "Ingrese edad del candidato: " ; 
        $edad = trim(fgets(STDIN)) ; 
        echo "Ingrese puntaje del candidato: " ; 
        $puntaje = trim(fgets(STDIN)) ; 
        $cantCandidatos = $cantCandidatos + 1 ; 
        $sumaEdad = $sumaEdad + $edad ; 
            if($puntajeAlto < $puntaje) {
                $puntajeAlto = $puntaje ; 
                $nombrePuntajeMayor = $nombre ; 
                $edadPuntajeMayor = $edad ;
            }
            if($puntaje >= 74 && $puntaje <= 80) {
                $cantPuntaje3 = $cantPuntaje3 + 1 ; 
            } elseif($puntaje >= 81 && $puntaje <= 90) {
                $cantPuntaje2 = $cantPuntaje2 + 1 ;
            } elseif($puntaje >= 91 && $puntaje <= 100) {
                $cantPuntaje1 = $cantPuntaje1 + 1 ;
            }
        echo "Desea añadir otro candidato? " ; 
        $respuesta = trim(fgets(STDIN)) ;
    } while($respuesta == "si") ; 

    $promedio = $sumaEdad / $cantCandidatos ; 

    echo "El promedio de la edad es: " . $promedio . "\n" ; 
    echo "Nombre del mejor puntaje: " . $nombrePuntajeMayor . " Edad del mejor puntaje: " . $edadPuntajeMayor . "\n" ; 
    echo "Cantidad de candidatos que aprobaron con un puntaje entre 91 y 100 puntos: " . $cantPuntaje1 . "\n" ; 
    echo "Cantidad de candidatos que aprobaron con un puntaje entre 81 y 91 puntos: " . $cantPuntaje2 . "\n" ; 
    echo "Cantidad de candidatos que aprobaron con un puntaje entre 74 y 80 puntos " . $cantPuntaje3 . "\n" ;