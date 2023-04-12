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

    echo "Ingrese cantidad a depositar: "  ; 
    $deposito = trim(fgets(STDIN)) ; 
            if($deposito == 0 || $deposito < 0) {
                echo "Ingrese una cantidad valida a depositar. \n" ; 
            } else {
                echo "Se han depositado $$deposito a su cuenta. \n" ; 
                $cantidad = $cuentaCesar -> depositar($deposito) ;            
            }

    echo "Ingrese cantidad a retirar: " ; 
    $cantidad = trim(fgets(STDIN)) ; 
        if($cantidad == 0 || $cantidad < 0) {
            echo "Ingrese una cantidad valida a retirar. \n" ; 
        } else {
            $disponible = $cuentaCesar -> retirar($cantidad) ; 
            if($disponible) {
            echo "Ha retirado $$cantidad de su cuenta. \n" ; 
            } else {
            echo "No tiene la cantidad suficiente en su cuenta para retirar.\n" ;
            }
        }

    $saldoActualizado = $cuentaCesar -> actualizarSaldo() . "\n" ; 
    echo $saldoActualizado ;
    echo $cuentaCesar ; 