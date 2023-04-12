<?php 

    include_once "classPersona.php" ; 
    include_once "classCuentaBancaria.php" ; 

    echo "Ingrese su nombre: " ; 
    $nombre = trim(fgets(STDIN)) ; 
    echo "Ingrese su apellido: " ; 
    $apeliido = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo de documento: " ; 
    $tipo = trim(fgets(STDIN)) ; 
    echo "Ingrese nro de documento: " ; 
    $nroDoc = trim(fgets(STDIN)) ; 

    $persona = new Persona($nombre, $apeliido, $tipo, $nroDoc) ; 
    // echo $persona ; 

/*
    echo "Ingrese su nro de cuenta: " ; 
    $nroCuenta = trim(fgets(STDIN)) ; 
    echo "Ingrese su saldo actual: " ; 
    $saldoActual = trim(fgets(STDIN)) ; 
    echo "Ingrese su interes anual: " ; 
    $interesAnual = trim(fgets(STDIN)) ;
*/
    $cuentaCesar = new CuentaBancaria(432, $persona, 50000, 2) ; 
    // $dni = $persona -> getNroDoc() ; 
    // echo $dni ; 

    echo $cuentaCesar ; 