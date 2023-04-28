<?php 

    class Cuenta {
        private $saldo ; 
        private $tipoCuenta ; 
        private $cliente ; 

        public function __construct(
            $saldo , 
            $tipoCuenta , 
            // objeto cliente de la clase persona 
            $cliente 
        )
        {
            $this -> saldo = $saldo ; 
            $this -> tipoCuenta = $tipoCuenta ; 
            $this -> cliente = $cliente ; 
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

        public function setSaldo($saldo) {
            $this -> saldo = $saldo ; 
        }

        public function setTipoCuenta($tipoCuenta) {
            $this -> tipoCuenta = $tipoCuenta ; 
        }

        public function setCliente($cliente) {
            $this -> cliente = $cliente ; 
        }

        public function saldoCuenta() {

        }

        public function realizarDeposito() {
            
        }

        public function realizarRetiro() {
            
        }

        public function __toString() {
            return "\n" . 
            "Saldo de la cuenta: " . $this -> getSaldo() . "\n" .  
            "Tipo de cuenta: " . $this -> getTipoCuenta() . "\n" . 
            "\n" . 
            "Datos del cliente: " 
            ; 
        }
    }