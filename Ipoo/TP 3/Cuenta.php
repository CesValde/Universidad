<?php 

    class Cuenta {
        private $saldo ; 
        private $tipoCuenta ; 
        private $cliente ; 
        private $nroCuenta ; 

        public function __construct(
            $saldo , 
            $tipoCuenta , 
            $cliente,       // objeto Persona_3
            $nroCuenta 
        )
        {
            $this -> saldo = $saldo ; 
            $this -> tipoCuenta = $tipoCuenta ; 
            $this -> cliente = $cliente ; 
            $this -> nroCuenta = $nroCuenta ; 
        }

        public function getSaldo() {
            return $this -> saldo ; 
        }

        public function getTipoCuenta() {
            return $this -> tipoCuenta ; 
        }

        public function getCliente() {
            return $this -> cliente ; 
        }
        
        public function getNroCuenta() {
            return $this -> nroCuenta ; 
        }

        public function setSaldo($saldo) {
            $this -> saldo = $saldo ; 
        }

        public function setTipoCuenta($tipoCuenta) {
            $this -> tipoCuenta = $tipoCuenta ; 
        }

        public function setCliente($cliente) {
            $this -> cliente = $cliente ; 
        }

        public function setNroCuenta($nroCuenta) {
            $this -> nroCuenta = $nroCuenta ; 
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
            "Saldo de la cuenta: " . $this -> getSaldo() . "\n" .  
            "Tipo de cuenta: " . $this -> getTipoCuenta() . "\n" . 
            "\n" . 
            "Datos del cliente: " . $this -> getCliente() . "\n" ;
        }
    }