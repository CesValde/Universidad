<?php 

    include_once "Cuenta.php" ; 

    class CuentaAhorro extends Cuenta {
        public function __construct(
            // nro de cuenta , ??
            $saldo, 
            $tipoCuenta, 
            $cliente  // obejto Persona_3
        ) {
            parent:: __construct(
                $saldo, 
                $tipoCuenta, 
                $cliente
            ) ; 
        }  

        public function saldoCuenta() {
            $saldo = $this -> getSaldo() ; 
            return $saldo ; 
        }

        public function realizarDeposito($monto) {
            $saldo = $this -> getSaldo() ; 
            $saldo = $saldo + $monto ; 
            $this -> setSaldo($saldo) ;
        }

        public function realizarRetiro($monto) {
            $saldo = $this -> getSaldo() ; 
            $saldo = $saldo - $monto ; 
            $this -> setSaldo($saldo) ; 
            return $monto ;  
        }

        public function __toString() {
            return "\n" . 
            "Saldo de la cuenta de ahorro: " . $this -> getSaldo() . "\n" . 
            "Tipo de cuenta: " . $this -> getTipoCuenta() . "\n" . 
            "\n" . 
            "Cliente: " . $this -> getCliente() . "\n" ; 
        }
    }