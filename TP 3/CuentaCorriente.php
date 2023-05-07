<?php 

    include_once "Cuenta.php" ; 

    class CuentaCorriente extends Cuenta {
        private $montoMax ; 

        // Pasar los atributos del elemento padre e hijo
        public function __construct(
            $montoMax, 
            $saldo, 
            $tipoCuenta, 
            $cliente,           // objeto Persona_3 
            $nroCuenta
        ) {
            parent:: __construct(
                $saldo, 
                $tipoCuenta, 
                $cliente, 
                $nroCuenta
            ) ; 
            $this -> montoMax = $montoMax ; 
        }  

        public function getMontoMax() {
            return $this -> montoMax ;
        }
        public function setMontoMax($montoMax) {
            $this -> montoMax = $montoMax ;
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
            "Monto maximo de la cuenta: " . $this -> getMontoMax() . "\n" . 
            "Saldo de la cuenta corriente: " . $this -> getSaldo() . "\n" . 
            "Tipo de cuenta: " . $this -> getTipoCuenta() . "\n" . 
            "\n" . 
            "Cliente: " . $this -> getCliente() . "\n" ; 
        }
    }