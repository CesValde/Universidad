<?php

    include_once "Banco.php" ; 
    include_once "Cliente.php" ;
    include_once "CuentaAhorro.php" ;  
    include_once "CuentaCorriente.php" ; 

    // test
    // 5.2  
    // objetos clientes  
    $cliente1 = new Cliente(8659, "Cesarito", "Valde", 95947908) ; 
    $cliente2 = new Cliente(7543, "Davito", "Londo", 29568839) ; 
    $coleccClientes = [$cliente1, $cliente2] ; 

    // 5.3
    // objeto cuenta corriente
    $cuentaCorr = new CuentaCorriente(500000, 5000, "corriente", $cliente1) ;
    $cuentaCorr2 = new CuentaCorriente(400000, 4000, "corriente", $cliente2) ;
    // objeto cuenta ahorro
    $cajaAhorro = new CuentaAhorro(2000, "ahorro", $cliente1) ; 
    $cajaAhorro2 = new CuentaAhorro(7000, "ahorro", $cliente1) ; 
    $cajaAhorro3 = new CuentaAhorro(6000, "ahorro", $cliente2) ; 

    // coleccion de cuentas
    $coleccCuentasCorr = [$cuentaCorr, $cuentaCorr2] ; 
    $coleccCajaAhorro = [$cajaAhorro, $cajaAhorro2, $cajaAhorro3] ; 

    // 5.1 
    // en caso de nro cuenta pasarlo como nulo ?? 
    $banco = new Banco($coleccCuentasCorr, $coleccCajaAhorro, "ultimo dato", $coleccClientes) ; 

    // checkpoint 
    // numCuenta agg en clases ?
    // punto 5
    //$cajaAhorro -> realizarDeposito($numCuenta, 300) ; 
    //$cajaAhorro2 -> realizarDeposito($numCuenta, 300) ; 
    //$cajaAhorro3 -> realizarDeposito($numCuenta, 300) ;

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

    $nuevoCliente = new Cliente(9990, "Pepito", "ggbro", 1111) ;
    $existeCliente = $banco -> incorporarCliente($nuevoCliente) ; 
        if($existeCliente) {
            echo "El cliente ya es cliente del banco \n" ;
        } else {
            echo "El cliente ahora es cliente del banco \n" ;
        }

    $incorporaCtaCorr = $banco -> incorporarCuentaCorriente(9990, 10000) ;
        if($incorporaCtaCorr) {
            echo "Se agrego la cuenta corriente \n" ; 
        } else {
            echo "No se agrego la cuenta corriente \n" ;
        }

    // ahora es cliente el nro 8102
    $nuevoCliente = new Cliente(8102, "Luffy", "D", 3453) ;
    $existeCliente = $banco -> incorporarCliente($nuevoCliente) ; 
        if($existeCliente) {
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

    // punto 7 ? 
    echo $banco ; 
    // echo $cajaAhorro2 ; 