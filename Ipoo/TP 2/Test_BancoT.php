<?php 

    include_once "BancoTramites.php" ; 
    include_once "Mostrador.php" ; 
    include_once "Cliente.php" ; 

    /* Test */

    // Clientes
    $cliente1 = new Cliente(95947908, "visa") ; 
    $cliente2 = new Cliente(95, "pasaporte") ;

    // Mostradores 
    $cola1 = [1, 2, 3, 4, 5] ; 
    $cola2 = [1, 2, 3] ;
    $mostrador1 = new Mostrador("visa", $cola2, 3) ; 
    $mostrador2 = new Mostrador("pasaporte",$cola1, 20) ; 
    $mostrador3 = new Mostrador("dni", $cola1, 10) ; 
    $mostrador4 = new Mostrador("visa", $cola1, 8) ;
    $coleccionMostradores = [$mostrador1, $mostrador2, $mostrador3, $mostrador4] ;

    // Banco 
    $banco = new BancoT($coleccionMostradores) ; 

    // anda de 10 yei
    $atender = $mostrador2 -> atiende("pasaporte") ; 
        if($atender) {
            echo "si" . "\n" ; 
        } else {
            echo "no" . "\n" ; 
        } 
    print_r($coleccionMostradores) ;  
    echo $mostrador2 ; 

    $mostradoresAtienden = $banco -> mostradoresQueAtienden("visa") ; 
    print_r($mostradoresAtienden) ; 

    $mejorMostrador = $banco -> mejorMostradorPara("visa") ; 
    echo $mejorMostrador ;
    
    $mensaje = $banco -> atender($cliente1) ; 
    echo $mensaje ; 

    /* parte 2 */
