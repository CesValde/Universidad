<?php 

    include_once "Cuenta.php" ; 

    class CuentaAhorro extends Cuenta {
        public function __construct(
            $saldo, 
            $tipoCuenta, 
            $cliente,       // objeto Persona_3
            $nroCuenta
        ) {
            parent:: __construct(
                $saldo, 
                $tipoCuenta, 
                $cliente, 
                $nroCuenta
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
            "Cliente: " . $this -> getCliente() . "\n" ; 
        }
    }