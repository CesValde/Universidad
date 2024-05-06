<?php

    include_once "Banco.php" ; 
    include_once "Cliente.php" ;
    include_once "CuentaAhorro.php" ;  
    include_once "CuentaCorriente.php" ; 

    // test
    // objetos clientes  
    $cliente1 = new Cliente(8659, "Cesarito", "Valde", 95947908) ; 
    $cliente2 = new Cliente(7543, "Davito", "Londo", 29568839) ; 
    $coleccClientes = [$cliente1, $cliente2] ; 

    // objetos cuenta corriente
    $cuentaCorr = new CuentaCorriente(500000, 5000, "corriente", $cliente1, 1) ;
    $cuentaCorr2 = new CuentaCorriente(400000, 4000, "corriente", $cliente2, 2) ;

    // objetos cuenta ahorro
    $cajaAhorro = new CuentaAhorro(9000, "ahorro", $cliente1, 3) ; 
    $cajaAhorro2 = new CuentaAhorro(7000, "ahorro", $cliente1, 4) ; 
    $cajaAhorro3 = new CuentaAhorro(6000, "ahorro", $cliente2, 5) ; 

    // coleccion de cuentas
    $coleccCuentasCorr = [$cuentaCorr, $cuentaCorr2] ; 
    $coleccCajaAhorro = [$cajaAhorro, $cajaAhorro2, $cajaAhorro3] ; 

    $banco = new Banco($coleccCuentasCorr, $coleccCajaAhorro, "ultimo dato", $coleccClientes) ; 

    // punto 5
    // este deposito no se hace porque supera el descubierto de la cuenta 
    $deposito = $banco -> realizarDeposito(2, 999999) ;
    // este si
    $deposito = $banco -> realizarDeposito(2, 10000) ;

    /* 
        sistema de retorno en numeros para saber pq no fue completado el pago 
        -1 sobrepaso el max 
        -2 no existe cuenta 
        -3 si se hace 
    */
        if($deposito == -1) {
            echo "Se sobrepaso el limite de su cuenta. Deposito rechazado \n" ; 
        } elseif($deposito == -2) {
            echo "La cuenta no existe \n" ;
        } else {
            echo "Deposito completado \n" ;
        }

    // estos depositos no se hacen porque supera el descubierto de la cuentas
    $deposito = $banco -> realizarDeposito(1, 8888800) ; 
    $deposito = $banco -> realizarDeposito(5, 2643634756) ;

    // el cliente con nro nro 9990 no existe
    $incorporaCtaCorr = $banco -> incorporarCuentaCorriente(9990, 10000) ;
        if($incorporaCtaCorr) {
            echo "Se agrego la cuenta corriente \n" ; 
        } else {
            echo "No se agrego la cuenta corriente \n" ;
        }
    
    // el cliente con nro nro 8102 no existe
    $incorporaCajaAhorro = $banco -> incorporarCajaAhorro(8102) ;
        if($incorporaCajaAhorro) {
            echo "Se agrego la caja de ahorro \n" ; 
        } else {
            echo "No se agrego la caja de ahorro \n" ;
        }

    // punto 6
    $transferencia = $cuentaCorr -> realizarRetiro(150) ; 
    $cajaAhorro2 -> realizarDeposito($transferencia) ; 

    // ahora es cliente el nro 9990 
    $nuevoCliente = new Cliente(9990, "Tu vieja", "el dramas", 1111) ;
    $existeCliente = $banco -> incorporarCliente($nuevoCliente) ; 
        if($existeCliente) {
            echo "El cliente ya es cliente del banco \n" ;
        } else {
            echo "El cliente ahora es cliente del banco \n" ;
        }

    //. 
    $incorporaCtaCorr = $banco -> incorporarCuentaCorriente(9990, 10000) ;
        if($incorporaCtaCorr) {
            echo "Se agrego la cuenta corriente \n" ; 
        } else {
            echo "No se agrego la cuenta corriente \n" ;
        }

    // ahora es cliente el nro 8102
    $nuevoCliente = new Cliente(8102, "Luffy", "D", 3453) ;
    $existeCliente = $banco -> incorporarCliente($nuevoCliente) ; 
        if($existeCliente == -1) {
            echo "El cliente ya es cliente del banco \n" ;
        } else {
            echo "El cliente ahora es cliente del banco \n" ;
        }
    
    $incorporaCajaAhorro = $banco -> incorporarCajaAhorro(8102) ;
        if($incorporaCajaAhorro) {
            echo "Se agrego la caja de ahorro \n" ; 
        } else {
            echo "No se agrego la caja de ahorro \n" ;
        }
        
    // punto 7
    echo $banco ; 