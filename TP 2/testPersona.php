<?php 

    include "classPersona.php" ; 

    echo "Ingrese su nombre: " ; 
    $nombre = trim(fgets(STDIN)) ; 
    echo "Ingrese su apellido: " ; 
    $apeliido = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo: " ; 
    $tipo = trim(fgets(STDIN)) ; 
    echo "Ingrese nro de documento: " ; 
    $nroDoc = trim(fgets(STDIN)) ; 

    $persona = new Persona($nombre, $apeliido, $tipo, $nroDoc) ; 

    echo $persona ; 