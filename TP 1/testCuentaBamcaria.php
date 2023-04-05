    <?php 

    include "classCuentaBancaria.php" ; 

    echo "Ingrese nro de cuenta: " ; 
    $nroCuenta = trim(fgets(STDIN)) ; 
    echo "Ingrese su dni: " ; 
    $dniCliente = trim(fgets(STDIN)) ; 
    echo "Ingrese su saldo actual: " ; 
    $saldoActual = trim(fgets(STDIN)) ; 
    echo "Ingrese interes anual: " ; 
    $interesAnual = trim(fgets(STDIN)) ; 

    $cuentaCesar = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ; 

    echo "Ingrese cantidad a retirar: " ; 
    $cantidad = trim(fgets(STDIN)) ; 
    $disponible = $cuentaCesar -> retirar($cantidad) ; 
        if($disponible) {
            echo "Ha retirado $$cantidad de su cuenta." ; 
        } else {
            echo "No tiene la cantidad suficiente en su cuenta para retirar.\n" ;
        }

    echo $cuentaCesar ; 




















/*
    // funcion Actualizar saldo 
    $saldoActuali = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ; 
    $verSaldoActuali = $saldoActuali -> actualizarSaldo() ; 
    echo $verSaldoActuali . "\n" ; 

    // funcion depositar
    echo "Ingrese cantidad de dinero a ingresar: " ; 
    $cantidad = trim(fgets(STDIN)) ; 

    $deposito = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ;     
    $saldo = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ;      
    $verDeposito = $deposito -> depositar($cantidad) ; 
    $saldoDispo = $saldo -> getSaldoActual() ; 
    echo "Ha depositado $$verDeposito ars a su cuenta. Saldo disponible en su cuenta: $saldoDispo" ; 


     funcion retirar
    echo "Ingrese cantidad de dinero a retirar: " ; 
    $cantidad = trim(fgets(STDIN)) ;
    

     listo 
    $retiro = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ; 
    $verRetiro = $retiro -> retirar($cantidad) ; 
    echo "Ha retirado de su cuenta $$verRetiro ars. Saldo restante en cuenta su $saldoActual " ; 
*/ 