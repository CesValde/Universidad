<?php 

    // preguntar que clases hay que agregar, consultar como se ve

    include_once "Persona.php" ; 
    include_once "Persona.php" ; 
    include_once "Disquera.php" ; 

/*
    echo "Ingrese horario de apertura: " ; 
    $hora_desde = trim(fgets(STDIN)) ; 
    echo "Ingrese horario de cierre: " ; 
    $hora_hasta = trim(fgets(STDIN)) ; 
    echo "Ingrese estado (abierta o cerrada): " ; 
    $estado = trim(fgets(STDIN)) ; 
    echo "Ingrese direccion: " ; 
    $direccion = trim(fgets(STDIN)) ;  
*/ 

    $hora_desde = strtotime( "8:00" ) ;     //  strtotime( $hora_desde )
    $hora_hasta = strtotime( "22:00" ) ;

    $disqueraCesarito = new Disquera($hora_desde, $hora_hasta, "abierto", "San Martin 463", $persona) ; 

    echo "Ingrese hora actual: " ; 
    $hora = trim(fgets(STDIN)) ;
    echo "Ingrese minutos actuales: " ; 
    $minutos = trim(fgets(STDIN)) ; 
    $estado = $disqueraCesarito -> dentroHorarioAtencion($hora, $minutos) ; 
        if($estado) {
            echo "El local esta abierto" . "\n" ; 
        } else {
            echo "El local esta cerrado" . "\n" ;
        } 
    $disqueraCesarito -> abrirDisquera($hora, $minutos) ; 
    $disqueraCesarito -> cerrarDisquera($hora, $minutos) ; 

    $disqueraCesarito -> convertirHorasUnixANormal() ; 
    echo $disqueraCesarito ; 